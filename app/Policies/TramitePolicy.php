<?php

namespace App\Policies;

use App\Models\Catalogos\{CatEstatus,CatEstatusFormulario};
use App\Models\{Tramite,Permiso,User};
use Illuminate\Auth\Access\HandlesAuthorization;

class TramitePolicy
{
    use HandlesAuthorization;

    // public function ver(User $user, Tramite $tramite)
    // {
    //     //Todos los roles administradores pueden verlo si ya fue ingresado el trámite por primera vez
    //     // TODO: Verificar esta condición con Nancy
    //     // if (in_array($user->getTextRol(), array_map('strtolower', Permiso::ADMINISTRADORES_NBS)) && !in_array($tramite->estatus->codigo, array_map('strtolower', CatEstatus::CREACION))){
    //     //     return true;
    //     // }

    //     //Si le pertenece el trámite puede visualizarlo
    //     if ($tramite->id_usuario == $user->idUsuario) {
    //         return true;
    //     }
    // }

    // public function editar(User $user, object $form = null)
    // {
    //     if ($form == null || !isset($form->tramite->estatus->codigo))
    //         return true;

    //     $tramite = $form->tramite;

    //     // Si no le pertenece el trámite no puede editarlo
    //     if ($tramite->id_usuario !== $user->idUsuario) return false;

    //     // Si el estatus del trámite no está en estatus INICIAL, EN_CAPTURA, ó PREVENIDO false
    //     if (!in_array($tramite->estatus->codigo, array_map('strtolower', CatEstatus::EDICION_AUXILIAR))) return false;

    //     //TODO: Agregar catálogo de CatEstatusFormulario y estatus para cada uno de los formularios que serán editados
    //     if ($tramite->estatus->codigo == strtolower(CatEstatus::PREVENIDO)) {
    //         // Si el estatus del formulario no está en PENDIENTE o RECHAZADO y el trámite está en estatus de prevención
    //         if (!in_array($form->estatus->codigo, array_map('strtolower', CatEstatusFormulario::EDICION_CIUDADANO))) return false;
    //     }
    //     //Para poder editar un formulario, te debe pertenecer el trámite
    //     //Debe estar en estatus INICIAL, EN_CAPTURA o PREVENCIÓN
    //     //Además el formulario que quieres editar debe estar en PENDIENTE o RECHAZADO, si el trámite está en prevención
    //     //Si el trámite está en estatus EN_CAPTURA siempre se puede editar
    //     return true;
    // }

    // public function bandejaEditar(User $user, Tramite $tramite)
    // {
    //     // Solo si le pertenece el trámite, puede modificar la información
    //     if ($tramite->id_usuario !== $user->idUsuario) return false;

    //     if (!in_array($tramite->estatus->codigo, array_map('strtolower', CatEstatus::EDICION_AUXILIAR))) return false;

    //     return true;
    // }

    // public function calificar(User $user, Tramite $tramite)
    // {
    //     if (in_array($user->getTextRol(), array_map('strtolower', Permiso::ADMINISTRADORES_NBS)))
    //         if ($tramite->estatus->codigo == CatEstatus::REVISION)
    //             return true;
    //     return false;
    // }

    // public function agregarObservaciones(User $user)
    // {
    //     // Solo si eres administrador de auxiliares
    //     if ($user->getTextRol() == strtolower(Permiso::NB_ADMINISTRADOR_AUXILIARES_ISC))
    //         return true;
    //     return false;
    // }

    // public function visualizarObservaciones(User $user, Tramite $tramite)
    // {
    //     // Si eres Supervisor o revisor
    //     if (in_array($user->getTextRol(), array_map('strtolower', Permiso::ADMINISTRADORES_NBS)))
    //         return true;
    //     // Si te pertenece el trámite y el código del trámite está en PREVENIDO o RECHAZADO
    //     if ($tramite->id_usuario == $user->idUsuario && in_array($tramite->estatus->codigo, array_map('strtolower', CatEstatus::COMENTARIOS)))
    //         return true;

    //     return false;
    // }

}
