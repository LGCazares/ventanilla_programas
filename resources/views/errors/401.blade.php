@extends('layouts.error')

@section('content')
<nav class="text-right container-fluid secciones" id="nav-secciones">&nbsp;</nav>

<div class="row align-items-center justify-content-center height-60 container">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-center">
            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-center">
                <h3 class="mt-5 encabezado-tramites">401</h3>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column border-left-thin-grey justify-content-center pl-md-4 pl-lg-5">
                <h3 class="error-title mt-5">No autorizado</h3>
                <p class="grey-light">No has iniciado sesión. Inicia sesión para acceder a este recurso.
                </p>
                <small><strong>ID de incidencia:</strong> {{session()->get('requuid')??'N/A'}}</small>
                <div class="align-self-lg-end mt-3 form">
                    <button type="button" onclick="location.href='{{route('login')}}';" class="btn-rosado">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection