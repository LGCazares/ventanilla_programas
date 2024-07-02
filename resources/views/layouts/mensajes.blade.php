
<div class="col-md-12 alerta">
{{-- errors --}}
@if($errors->any())
<!--     <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
        <div class="d-flex justify-content-start">
            <i class="fa-solid fa-circle-exclamation my-1 me-2"></i> 
            <div>
                <strong>¡Error!</strong> {{ $errors->first() }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div> -->
@endif

{{-- success --}}
@if(session()->has('success') && session('success')!='')
    <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
        <div class="d-flex justify-content-start">
            <i class="fa-solid fa-circle-check my-1 me-2"></i>
            <div>
                <strong>¡Éxito!</strong> {{ session('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- error --}}
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="d-flex justify-content-start">
            <i class="fa-solid fa-triangle-exclamation my-1 me-2"></i>
            <div>
                <strong>¡Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- info --}}
@if(session()->has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <div class="d-flex justify-content-start">
            <i class="fa-solid fa-circle-info my-1 me-2"></i>
            <div>
                <strong>Información:</strong> {!! session('info') !!}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- warning --}}
@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="d-flex justify-content-start">
            <img src="{{ asset('images/icons/warning.png') }}" class="icon me-2">
            <div>
                <strong>Aviso:</strong> {!! session('warning') !!}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif
</div>