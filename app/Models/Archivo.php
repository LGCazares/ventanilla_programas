<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    /**
     * Nombre de la tabla asociada al modelo
     *
     * @var String
     */
    protected $table = 't001301_archivo_app';


    /**
     * Nombres de columna que pueden ser asignados "En Masa"
     *
     * @var Array
     */
    protected $fillable = [
        'nb_archivo', 
        'tx_mime_type', 
        'nu_tamano',
        'tx_uuid', 
        'tx_sha256', 
        'usr_alta',
        'es_docto_expediente',
        'id_documento_expediente',
        'docto_expediente_validado',
        'id_subclasificacion_expediente',
    ];


    /**
     * Nombres de columna que se ocultan al hacer
     * conversion a JSON o Array
     *
     * @var Array
     */
    protected $hidden = [
        'tx_uuid', 'tx_sha256'
    ];


    /**
     * Mutator para columnas de fecha
     *
     * @var Array
     */
    protected $dates = [
        'fh_alta', 'fh_borrado'
    ];
}
