<?php

namespace App\AdipUtils;

use App\Models\Archivo;
use App\AdipUtils\ErrorLoggerService as Logg;
use App\Models\Catalogos\CatArchivos;
use App\Models\Tramite;
use Illuminate\Support\Facades\Session;
use Str;
use Auth;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

final class FileService
{

    /**
     * Constantes del modelo
     */
    public const STORAGE_FOLDER_NAME = 'app_archivos';

    /**
     * Desactivar instanciación de clase
     */
    private function __construct()
    {
    }


    /**
     * Obtiene información de un archivo almacenado
     *
     * @param String $uuid Identificador de archivo
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return Object
     */
    public static function getFile(String $uuid): Object
    {
        $archs = Archivo::where('tx_uuid', '=', $uuid)->get();
        if (count($archs) === 1) {
            $arch = $archs[0];
            $realArch = storage_path('app' . DIRECTORY_SEPARATOR . self::STORAGE_FOLDER_NAME . DIRECTORY_SEPARATOR . $arch->tx_uuid . '.dat');
            if (file_exists($realArch)) {
                return (object)['real_path' => $realArch, 'archivo' => $arch];
            } else {
                Logg::log(__METHOD__, 'No se encontró el archivo ' . $uuid, 404);
                abort(404, "No encontrado");
            }
        } else {
            Logg::log(__METHOD__, 'El UUID devuelve un valor diferente a 1.', 422);
            abort(422, 'El identificador del archivo no es válido');
        }
    }


    /**
     * Obtiene información de un archivo almacenado como público
     *
     * @param String $uuid Identificador de archivo
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return Object
     */
    public static function getPublicFile(String $uuid): Object
    {
        $archs = Archivo::where('tx_uuid', '=', $uuid)->get();
        if (count($archs) === 1) {
            $arch = $archs[0];
            if ($arch->st_public !== 1) {
                Logg::log(__METHOD__, 'Se intentó acceder al recurso no público ' . $uuid . ' usando getPublicFile()', 403);
                abort(403, "El recurso no es de acceso público");
            }
            $realArch = storage_path('app' . DIRECTORY_SEPARATOR . self::STORAGE_FOLDER_NAME . DIRECTORY_SEPARATOR . $arch->tx_uuid . '.dat');
            if (file_exists($realArch)) {
                return (object)['real_path' => $realArch, 'archivo' => $arch];
            } else {
                Logg::log(__METHOD__, 'No se encontró el archivo ' . $uuid, 404);
                abort(404, "No encontrado");
            }
        } else {
            Logg::log(__METHOD__, 'El UUID devuelve un valor diferente a 1.', 422);
            abort(422, 'El identificador del archivo no es válido');
        }
    }


    /**
     * Almacena un archivo en el Storage del arquetipo
     *
     * @param Illuminate\Http\UploadedFile $archivo
     * @param bool $isPublic
     * @return Object
     */
    public static function store(UploadedFile $archivo,$isExpediente = FALSE,?int $id_subclasificacion_documento, ?int $id_documento_expediente = NULL, $isPublic = FALSE)
    {
        $toSave = new Archivo;
        $toSave->nb_archivo = $archivo->getClientOriginalName();
        $toSave->tx_mime_type = $archivo->getMimeType();
        $toSave->nu_tamano = $archivo->getSize();
        $toSave->tx_uuid = Str::uuid()->toString();
        $toSave->tx_sha256 = hash_file('sha256', $archivo->path());
        $toSave->usr_alta = Auth::user()->idUsuario;
        $toSave->st_public = (int)$isPublic;
        $toSave->es_docto_expediente = (int)$isExpediente;
        if($isExpediente){
            $toSave->id_documento_expediente = $id_documento_expediente;
        }
        $toSave->id_subclasificacion_expediente = $id_subclasificacion_documento;
        $archivo->storeAs(self::STORAGE_FOLDER_NAME, $toSave->tx_uuid . '.dat');
        $toSave->save();
        return (object)[
            'id' => $toSave->id,
            'nb_archivo' => $toSave->nb_archivo,
            'tx_mime_type' => $toSave->tx_mime_type,
            'nu_tamano' => $toSave->nu_tamano,
            'tx_uuid' => $toSave->tx_uuid,
        ];
    }

    // TODO: Revisar si se ocupa
    /**
     * Duplica lógica y físicamente un archivo en el Storage del arquetipo
     *
     * @param int $archivo_id
     * @return Object
     */
    public static function duplicate($archivo_id){
        $old_file = Archivo::find($archivo_id);
        if (isset($old_file)){
            $general_storage_path = 'app' . DIRECTORY_SEPARATOR . self::STORAGE_FOLDER_NAME . DIRECTORY_SEPARATOR;
            $storage_path_file = storage_path($general_storage_path. $old_file->tx_uuid . '.dat');
            $new_uuid = Str::uuid()->toString();
            $path_to_new_file = storage_path($general_storage_path. $new_uuid. '.dat');
            if (file_exists($storage_path_file)) {
                if (!copy($storage_path_file, $path_to_new_file)) {
                    return null;
                }
                $toSave = new Archivo;
                $toSave->nb_archivo = $old_file->nb_archivo;
                $toSave->tx_mime_type = $old_file->tx_mime_type;
                $toSave->nu_tamano = $old_file->nu_tamano;
                $toSave->tx_uuid = $new_uuid;
                $toSave->tx_sha256 = hash_file('sha256', $path_to_new_file);
                $toSave->usr_alta = $old_file->usr_alta;
                $toSave->st_public = (int)$old_file->st_public;
                $toSave->save();
                return (object)[
                    'id' => $toSave->id,
                    'nb_archivo' => $toSave->nb_archivo,
                    'tx_mime_type' => $toSave->tx_mime_type,
                    'nu_tamano' => $toSave->nu_tamano,
                    'tx_uuid' => $toSave->tx_uuid,
                ];
            }
            return null;
        }
        return null;
    }

    /**
     * Elmina físicamente un archivo en el Storage
     *
     * @param Archivo $archivo
     * @return bool
     */
    public static function physicalDelete(Archivo $archivo): bool
    {
        $general_storage_path = 'app' . DIRECTORY_SEPARATOR . self::STORAGE_FOLDER_NAME . DIRECTORY_SEPARATOR;
        $storage_path_file = storage_path($general_storage_path. $archivo->tx_uuid . '.dat');
        if (file_exists($storage_path_file)) {
            unlink($storage_path_file);
            $archivo->delete();
            return true;
        }
        return false;
    }


    /**
     * Elmina físicamente n archivos en el Storage
     *
     * @param Array $file_codes
     * @return void
     */

    public static function deleteFilesFromCode($file_codes){
        $tramite_id = Session::get('tramite_id');
        $tramite = Tramite::findOrFail($tramite_id);
        foreach ($file_codes as $code){
            $documento_code = $tramite->getTramiteDocumentoByCode($code);
            $documento = optional($tramite->getTramiteDocumentoByCode($code))->documento;
            if (isset($documento)){
                $documento_code->delete();
                FileService::physicalDelete($documento);
            }
        }
    }

    /**
     * Copia un archivo del sistema de archivos al storage del arquetipo
     *
     * @param \SplFileInfo $archivo
     * @param bool $isPublic
     * @return Object
     */
    public static function addToStorage(\SplFileInfo $archivo, $isPublic = FALSE): Object
    {
        if (!is_file($archivo->getRealPath())) {
            abort(404, $archivo->getFilename() . ' no es un archivo');
        }
        $toSave = new Archivo;
        $toSave->nb_archivo = $archivo->getFilename();
        $toSave->tx_mime_type = mime_content_type($archivo->getRealPath());
        $toSave->nu_tamano = $archivo->getSize();
        $toSave->tx_uuid = Str::uuid()->toString();
        $toSave->tx_sha256 = hash_file('sha256', $archivo->getRealPath());
        $toSave->usr_alta = 0;
        $toSave->st_public = (int)$isPublic;
        \File::copy(
            $archivo->getRealPath(),
            storage_path('app' . DIRECTORY_SEPARATOR . self::STORAGE_FOLDER_NAME . DIRECTORY_SEPARATOR . $toSave->tx_uuid . '.dat')
        );
        $toSave->save();
        return (object)[
            'id' => $toSave->id,
            'nb_archivo' => $toSave->nb_archivo,
            'tx_mime_type' => $toSave->tx_mime_type,
            'nu_tamano' => $toSave->nu_tamano,
            'tx_uuid' => $toSave->tx_uuid,
        ];
    }

    public static function fromBase64(string $name, string $base64File): UploadedFile
    {
        // $bin = base64_decode(Arr::last(explode(',', $base64File)), true);
        $bin = base64_decode($base64File, true);
        $tempFile = tmpfile();
        $tempFilePath = stream_get_meta_data($tempFile)['uri'];

        file_put_contents($tempFilePath, $bin);


        $tempFileObject = new File($tempFilePath);
        $file = new UploadedFile(
            $tempFileObject->getPathname(),
            $name,
            $tempFileObject->getMimeType(),
            0,
            true
        );

        app()->terminating(function () use ($tempFile) {
            fclose($tempFile);
        });

        return $file;
    }
}
