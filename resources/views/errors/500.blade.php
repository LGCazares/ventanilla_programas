@extends('layouts.error')

@section('content')
<nav class="text-right container-fluid secciones" id="nav-secciones">&nbsp;</nav>

<div class="row align-items-center justify-content-center height-60 container">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-center">
            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-center">
                <h3 class="mt-5 encabezado-tramites">500</h3>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column border-left-thin-grey justify-content-center pl-md-4 pl-lg-5">
                <h3 class="error-title mt-5">Ha ocurrido un error</h3>
                <p class="grey-light">
                @if(App::environment() == 'production')
                    Lo sentimos, no fue posible procesar la solicitud ahora.
                @else
                    {{ $exception->getMessage() }}
                @endif</p>
                <small><strong>ID de incidencia:</strong> {{session()->get('requuid')??'N/A'}}</small>
                <div class="align-self-lg-end mt-3 form">
                    <button type="button" onclick="location.href='{{route('welcome')}}'" class="btn-normal" title="Regresar a la página de inicio">Regresar al inicio</button>
                </div>
            </div>
        </div>

        @if(App::environment() != 'production')
        <div class="row justify-content-center">
            <div class="col-8 d-flex flex-column border-left-thin-grey justify-content-center pl-md-4 pl-lg-5">
                <h3 class="error-title mt-5">Información técnica</h3>
                <textarea class="w-100" rows="10" readonly>{!! $exception instanceof \Throwable ? $exception->getTraceAsString():'No debug info'!!}</textarea>
                <div class="text-right p-2">
                    <a title="Buscar en Google {{ $exception->getMessage() }}" href="https://google.com/search?q={{ $exception->getMessage() }}" target="_blank" class="lupa"><span class="fa fa-2x fa-search">&nbsp;</span></a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
