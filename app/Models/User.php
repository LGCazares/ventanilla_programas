<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Auth\NoRememberTokenAuthenticable;
use App\Models\Permiso;

class User extends Authenticatable
{
    /**
     * Traits
     */
    use Notifiable;
    use NoRememberTokenAuthenticable;

    
    /**
     * Desactivar campos created_at y updated_at
     *
     * @var bool
     */
    public $timestamps = FALSE;


    /**
     * Campos tratados como objetos fecha
     *
     * @var Array
     */
    public $dates = ['fechaNacimiento'];


    /**
     * Establecer la clave primaria del modelo
     *
     * @var String
     */
    protected $primaryKey = 'idUsuario';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idUsuario',
        'login',
        'nombre',
        'primerApellido',
        'segundoApellido',
        'telVigente',
        'curp',
        'fechaNacimiento',
        'sexo',
        'idEstadoNacimiento',
        'estadoNacimiento',
        'idRolUsuario',
        'descripcionRol'
    ];


    /**
     * Relacion con Permisos
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permisos()
    {
        return $this->belongsToMany(\App\Models\Permiso::class, 'permiso_user', 'id_usuario', 'id_permiso');
    }


    /**
     * Determina si el usuario autenticado tiene determiminado rol
     *
     * @return bool
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(403, 'No tienes permiso para realizar esta operación.');
    }


    /**
     * Función que determina si un usuario tiene determinado permiso
     *
     * @param int|Array $roles    ID de un permiso o array con Id's de permisos.
     *                            Si $roles se omite o es cero, verifica que el
     *                            usuario tenga por lo menos un rol
     * @return bool
     */
    public function hasAnyRole($roles = 0)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($roles === 0) {
                $roles = Permiso::CIUDADANO;
            }
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }


    /**
     * Obtiene el nombre del usuario
     *
     * @return string El nombre del usuario o "No disponible" si no se encuentra.
     */
    public function getNombreCompleto(): string
    {
        $nombre = trim($this->nombre . ' ' . $this->primerApellido . ' ' . $this->segundoApellido);

        return $nombre ?: 'No disponible';
    }

    /**
     * Función que determina si un usuario tiene el permiso dado
     *
     * @param int $roles ID de un permiso
     * @return bool TRUE si tiene el permiso o uno de los permisos. FALSE si no
     */
    public function hasRole($role)
    {
        if ($this->permisos()->where('id', $role)->first()) {
            return true;
        }
        return false;
    }


    /**
     * Devuelve una cadena de texto con el rol del usuario.
     *
     * @return string
     */
    public function getTextRol(): string
    {
        return match (true) {
            $this->hasRole(Permiso::ADMINISTRADOR) => strtolower(Permiso::NB_ADMINISTRADOR),
            $this->hasRole(Permiso::TURISMO) => strtolower(Permiso::NB_TURISMO),
            $this->hasRole(Permiso::SEDUVI) => strtolower(Permiso::NB_SEDUVI),

            default => 'ciudadano',
        };
    }


    /**
     * Devuelve el ID del rol del usuario.
     *
     * @return int
     */
    public function getIdRol(): int
    {
        return match (true) {
            $this->hasRole(Permiso::ADMINISTRADOR) => Permiso::ADMINISTRADOR,
            $this->hasRole(Permiso::TURISMO) => Permiso::TURISMO,
            $this->hasRole(Permiso::SEDUVI) => Permiso::SEDUVI,

            default => Permiso::CIUDADANO,
        };
    }


    public function comments()
    {
        return $this->hasMany(DetComentario::class, 'id_usuario', 'idUsuario');
    }
}
