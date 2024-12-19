<footer>
    @if (config('app.use_frontbase'))
        <object title="Pie de página" id="footerIframe" data="{{ config('app.url_footer') }}"
            style="min-height:100px; width:100%; border:none; overflow:hidden;">
            <p class="fb-error">No pudimos cargar el pie de página</p>
        </object>
    @else
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="row my-1">
                        <div class="col-12 col-md-3">
                            <img class="img-fluid" role="image" src="{{ asset('images/footer-logo_cdmx_new.svg') }}"
                                alt="Logotipo del Gobierno de la Ciudad de México"
                                title="Logotipo del Gobierno de la Ciudad de México"
                                aria-label="Logotipo del Gobierno de la Ciudad de México">
                        </div>
                        <div class="col-12 col-md-2 mt-3 mt-md-0">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-12 with-separator">
                                    <p>Para emergencias, <br> marca al <b>911</b></p>
                                </div>
                                <div class="col-12 col-sm-6 col-md-12">
                                    <p>Dudas e información, <br> marca al <a href="tel:*0311"><b>*0311</b></a></p>
                                </div>
                            </div>
                            <hr class="separador-footer d-sm-none">
                        </div>
                        <div class="col-12 col-md-2 mt-sm-2 mt-md-0">
                            <h5>Redes de la Ciudad</h5>
                            <a class="redes" href="https://es-la.facebook.com/GobiernoCDMX/" target="_blank"
                                title="Ir a la página del Gobierno de CDMX en Facebook" class="mr-3">
                                <img src="{{ asset('images/fb-button.svg') }}" alt="Logotipo de Facebook">
                            </a>
                            <a class="redes" href="https://twitter.com/GobCDMX" target="_blank"
                                title="Ir a la página dela Gobierno de CDMX en Twitter">
                                <img src="{{ asset('images/tw-button.svg') }}" alt="Logotipo de Twitter">
                            </a>
                            <hr class="separador-footer d-sm-none">
                        </div>
                        <div class="col-12 col-md-3 mt-sm-3 mt-md-0">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-12 with-separator">
                                    <h5>Sitios Relacionados</h5>
                                    <div style="max-height:15px">
                                        <a href="https://adip.cdmx.gob.mx/" target="_blank" class="related-link"
                                            title="Ir a la página de la Agencia Digital de Innovación Pública">
                                            Agencia Digital de Innovación Pública
                                        </a>
                                    </div>
                                    <div style="max-height:15px">
                                        <a href="https://www.semovi.cdmx.gob.mx/" target="_blank" class="related-link"
                                            title="Ir a la página de la Secretaría de Movilidad">
                                            Secretaría de Movilidad
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-12 mt-3 mt-sm-0 mt-md-3">
                                    <h5>Transparencia</h5>
                                    <ul class="m-0 p-0 pb-2">
                                        <li>
                                            <a href="https://transparencia.cdmx.gob.mx/" target="_blank"
                                                class="related-link"
                                                title="Ir al Portal de Transparencia de la Ciudad de México">
                                                Ir al portal de Transparencia <span
                                                    class="fa fa-arrow-right">&nbsp;</span>
                                            </a>
                                        </li>
                                    </ul>
                                    {{-- <p class="d-none d-md-inline mt-4"><a href="{{ asset('files/aviso_privacidad.pdf') }}" target="_blank"><b>Aviso de privacidad</b></a></p> --}}
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-2 text-center d-none d-md-inline">
                            <a href="https://datos.cdmx.gob.mx/" target="_blank"
                                title="Ir al Portal de Datos Abiertos de la CDMX">
                                <img src="{{ asset('images/footer_logo_2025.png') }}"
                                    alt="Logotipo Portal Datos Abiertos" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="greca-footer"></div>
    @endif
</footer>