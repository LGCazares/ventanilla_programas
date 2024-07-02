@extends('layouts.app')
@section('content')
    <object class="widget mt-4" data="{{ config('app.url_widget') }}" style="width:100%"></object>
    <section id="welcome" class="container mt-3 mb-5" style="max-width:969px;">
        <div class="cont-img py-5 text-right">
            <div class="col-12">
                <h2 class="mx-5 mt-3">{{ config('app.name') }}</h2>
                <p class="mx-5 mt-3 header"><b>{{ config('app.description_anfitrion') }}</b></p>
                <p class="mx-5 mt-3 header"><b>{{ config('app.description_plataformas') }}</b></p>
            </div>
        </div>
        <div class="row justify-content-center mx-4">
            <div class="col-12 py-3">
                <div class="row actionz justify-content-between">
                    <div class="col-md-6 mt-2 text-center">
                        <div class="col-12 col-md-12">
                            <img src="{{ asset('images/expediente/logoExpediente.svg') }}" />
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="col-md-8 col-8 text-center">
                            <div class="dropdown">
                                <button class="w-100 btn-menu-main dropdown-toggle align-middle mt-3 mt-sm-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Iniciar
                                </button>
                                <ul class="dropdown-menu menu-main-items" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('login') }}" title="Iniciar el trámite">Nuevo trámite</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a target="_blank" class="dropdown-item" href="{{ config('app.url_expediente') }}" title="Abre el Portal de Servicios en una pestaña nueva">Ir a mi expediente</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-start mx-5">
            <div class="col-md-12 block-requisitos py-0">
                <h3 class="my-2">¿Cómo puedes hacerlo en línea?</h3>
                <ul class="lst-requisitos">
                    <li class="mt-3">Inicia sesión con Llave CDMX Expediente ¿Aún no tienes una? Créala aquí.</li>
                    <li class="mt-3">Para poder registrar tus inmuebles, es necesario contar con la información correspondiente sobre cada uno de ellos.</li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center mx-4">
            <div class="col-md-6 block-requisitos">
                <div class="col-12 tira-header">
                    <h3 class="mt-3 text-center fw-700">Padrón de <br>anfitriones</h3>
                </div>
                <div class="mx-5">
                    <h3 class="mt-5 mb-3">Información importante</h3>
                    Como anfitrión, aquí podrás:
                    <ul>
                        <li class="my-2">Registrar, actualizar y dar de baja tus estancias turísticas</li>
                        <li class="my-2">Realizar tus reportes semestrales</li>
                        <li class="my-2">El trámite no tiene costo</li>
                    </ul>
    
                    <h3 class="mt-5 mb-3">Requisitos para registrar un inmueble</h3>
                    <ol>
                        <li class="my-5">Documento con el que acredita la propiedad, administración o posesión de cada uno de los inmuebles registrados. </li>
                        <li class="my-5">Cédula de Registro Federal de Contribuyentes. </li>
                        <li class="my-5">Constancia de situación fiscal. </li>
                        <li class="my-5">Constancias de no Adeudos de Predial del inmueble registrado. </li>
                        <li class="my-5">Constancias de no Adeudos de Agua del inmueble registrado. </li>
                        <li class="my-5">Carta bajo protesta de decir verdad en la que se indique que el inmueble cumple con las medidas de seguridad, atendiendo la normatividad en materia de gestión integral de riesgos y protección civil. </li>
                        <li class="my-5">Acuse de notificación a la Asamblea General de Condóminos de la prestación del servicio de Estancia Turística Eventual en caso de que el inmueble se encuentre al interior de un condominio.</li>
                        <li class="my-5">Carátula de la póliza o documento que acredite que el Inmueble cuenta con Seguro de responsabilidad civil suficiente que cubra posibles riesgos en la prestación de los servicios, por cada inmueble registrado, cuando cuente con éste. </li>
                        <li class="my-5">Identificación oficial y comprobante de domicilio del anfitrión, o en su caso, de cada representante legal/ apoderado o Intermediario.</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6 mt-5 mt-sm-0 block-queson">
                <h3 class="mt-3 px-3 text-center">Padrón de Plataformas Tecnológicas</h3>
                <div class="mx-5">
                    <h3 class="mt-5 mb-3">Información importante</h3>
                    Como plataforma tecnológica aquí podrás:
                    <ul>
                        <li class="my-2">Registrar, actualizar y  dar de baja tus plataformas tecnológicas</li>
                        <li class="my-2">El trámite no tiene costo</li>
                    </ul>

                    <h3 class="mt-5 mb-3">Requisitos para registrar una plataforma tecnológica</h3>
                    <ol>
                        <li class="my-5">Cédula de Registro Federal de Contribuyentes de la Plataforma tecnológica. </li>
                        <li class="my-5">Constancia de situación fiscal.</li>
                        <li class="my-5">Comprobante de domicilio.</li>
                        <li class="my-5">Carátula de la póliza de Seguro de responsabilidad civil contratado con una aseguradora acreditada ante la Comisión Nacional de Seguros y Fianzas. </li>
                    </ol>
                </div>
            </div>
            <div class="col-12 my-4">&nbsp;</div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.onresize = calcHeight;
            calcHeight();

            function calcHeight() {
                var dt_height_last = $('.dt--description-title').last().height();
                var dd_height_last = $('.dt--description-title').next('dd').last().height();
                var line_height = $('.dl__home-steps').height();
                var total_height = line_height - (dt_height_last + dd_height_last);
                $('.dl__home-steps').css('height', 'calc(100% - ' + dt_height_last + 'px - ' + dd_height_last +
                    'px - 46px)');
            }
        });
    </script>
@endsection
