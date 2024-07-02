<?php

namespace App\AdipUtils;

use App\AdipUtils\{SimpleCURL, FileService};
use App\Models\Correo;
use Illuminate\Support\Facades\Log;

final class MandrillMail
{
    protected $class_name;

    /**
     * Instancia de SimpleCURL para comunicación con el servicio de Mandrill
     *
     * @var SimpleCURL
     */
    private $curl;


    /**
     * Crea una nueva instancia de MandrillMail.
     *
     * @throws \Exception
     */
    public function __construct($url = '')
    {
        $this->class_name = class_basename(static::class);

        if (!SimpleCURL::isRunnable()) {
            Log::error("[$this->class_name] . __construct");
            Logg::log(__METHOD__, 'No se puede ejecutar una de las dependencias de esta API.', 0);

            throw new \Exception('No se puede ejecutar Mandrill si no está activada la extensión cURL');
        }

        $this->curl = new SimpleCURL();
    }


    /**
     * Envía un correo utilizando el servicio Mandrill.
     *
     * @param Correo $correo El objeto de correo a enviar.
     * @return array El resultado de la operación de envío de correo.
     * @throws \Exception Si ocurre un error al enviar el correo.
     */
    public function sendMail(Correo $correo): array
    {
        try {
            $attachments = $this->prepareAttachments($correo);

            $mandrillData = [
                'key' => config('engine.mandrillsecret'),
                'message' => [
                    'html' => $correo->tx_body,
                    'text' => strip_tags($correo->tx_body),
                    'subject' => $correo->tx_subject,
                    'from_email' => $correo->tx_from,
                    'from_name' => config('mail.from.name'),
                    'to' => [
                        [
                            'email' => $correo->tx_to,
                            'name' => '',
                            'type' => 'to'
                        ]
                    ],
                    'attachments' => $attachments,
                    'important' => $correo->nu_priority === 1,
                ],
                'async' => false
            ];

            $this->curl->setUserAgent('Mandrill-Curl/1.0');
            $this->curl->setUrl(config('engine.mandrillurl'));
            $this->curl->setData(json_encode($mandrillData));
            $this->curl->addHeader(['name' => 'Content-Type', 'value' => 'application/json']);
            $this->curl->prepare();

            $resultMail = $this->curl->execute();

            $oResult = json_decode($resultMail, true);

            if ($oResult === null) {
                throw new \Exception('Error en la respuesta del servicio de envío de correo.');
            }

            return $oResult;
        } catch (\Exception $e) {
            Log::error("[$this->class_name] . sendMail");
            Log::error('Error al enviar el correo', ['subject' => $correo->tx_subject, 'from_email' => $correo->tx_from]);

            throw new \Exception('Error al enviar el correo: ' . $e->getMessage());
        }
    }


    /**
     * Verifica si un correo tiene datos adjuntos y los prepara para el envío.
     *
     * @param Correo $correo El objeto de correo.
     * @return array Los datos de los adjuntos preparados para el envío.
     */
    private function prepareAttachments(Correo $correo): array
    {
        $attachments = [];

        if (empty($correo->archivos)) return $attachments;

        foreach ($correo->archivos as $adjunto) {
            $attachments[] = [
                'type' => $adjunto->tx_mimetype,
                'name' => $adjunto->nb_archivo,
                'content' => base64_encode(file_get_contents(FileService::getFile($adjunto->tx_uuid)->real_path))
            ];
        }

        return $attachments;
    }
}
