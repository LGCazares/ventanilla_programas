<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Permiso extends Model
{
    /**
     * Constantes.
     */
    public const CIUDADANO      = 1;
    public const NB_CIUDADANO = 'Ciudadano';

    public const ADMINISTRADOR = 1081;
    public const NB_ADMINISTRADOR = 'Administrador';

    public const TURISMO = 1082;
    public const NB_TURISMO = 'Secretaria de Turismo';

    public const SEDUVI = 1083;
    public const NB_SEDUVI = 'Seduvi';

    /**
    * ROLES 
    * ID_ROL: 1081 ROL: Administrador USUARIO: qatest110@cdmx.gob.mx PASSWORD: m0n!24d3Vt3r(
    * ID_ROL: 1082 ROL: Secretaria de Turismo USUARIO: qatest111@cdmx.gob.mx PASSWORD: 3n(!fr4!d3v05
    * ID_ROL: 1083 ROL: SEDUVI  USUARIO: qatest112@cdmx.gob.mx PASSWORD: Pr!)4c7id!3v
    */ 
    /**
     * Relación con usuarios
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'permiso_user', 'id_permiso', 'id_usuario');
    }
}
