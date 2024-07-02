<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitado extends Authenticatable
{
    /**
     * Traits
     */
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_apellido_paterno', 'tx_apellido_materno', 'tx_nombre', 'email', 'password',
    ];


    /**
     * Nombre de la tabla asociada al modelo
     *
     * @var String
     */
    protected $table = 'invitados';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Define el guard que se usa en la autenticación
     *
     * @var String
     */
    protected $guard = 'invitado';

    /**
     * Devuelve el nombre completo del invitado
     *
     * @return String
     */
    public function getFullName():String{
        return $this->tx_nombre.' '.$this->tx_apellido_paterno.' '.$this->tx_apellido_materno;
    }
}
