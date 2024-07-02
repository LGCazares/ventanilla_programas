    <!-- Metasssss -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="urlbase" content="{{ url('') }}">
    <meta name="author" content="Agencia Digital de Innovavión Pública">
    <meta name="title" content="{{config('app.name')}}">
    <meta name="description" content="{{config('app.description')}}">
    <meta name="robots" content="{{ strtolower(App::environment())=='production' ? 'index,follow' :'noindex,nofollow' }}">
    @if(config('app.env') != 'local')
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endif
    <meta name="keywords" content="{{ config('app.keywords') }}">
    <link rel="author" type="text/plain" href="{{route('humans_txt')}}" charset="UTF-8" />

    @if(config('engine.home_disabled') && \Request::route()->getName() =='welcome')
        <meta http-equiv="refresh" content="0;URL={{ config('engine.home_redirect') }}" />
    @endif
