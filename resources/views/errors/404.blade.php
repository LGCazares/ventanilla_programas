@extends('layouts.app')

@section('nav-title')
    <h1 class="ml-auto mb-0 h5 font-weight-semibold d-none d-sm-inline-block"></h1>
@endsection

@section('content')
    <section class="container mt-5 pt-2r pb-5">
        <div class="bg-white rounded-xxl col-lg-12 col-12 p-5">
            <div class="row align-items-center justify-content-center height-60">
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row justify-content-center">
                        <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-center">
                            <h3 class="fs-500 grassy-green">404</h3>
                        </div>
                        <div
                            class="col-12 col-md-6 d-flex flex-column border-left-thin-grey justify-content-center pl-md-4 pl-lg-5">
                            <h3 class="fs-24 fw-bold bluish-grey">El recurso al que intenta acceder no existe.</h3>
                            <p class="grey-light">Puede ser que el recurso haya sido movido desde la última vez que
                                visitó la página,
                                o que haya escrito incorrectamente la dirección.</p>
                            <div class="align-self-lg-end">
                                <a href="{{ url('') }}" class="btn-04">Inicio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
