@php
    if(Auth::user()->hasRole(Permiso::ADMINISTRADOR) ||
        Auth::user()->hasRole(Permiso::TURISMO) ||
        Auth::user()->hasRole(Permiso::SEDUVI)
    ){
        $ruta = 'admin.auxiliares.bandeja';
    }else{
        $ruta = 'auxiliar.bandeja';
    }
@endphp
<html>
    <head>
        <title>Redireccionando</title>
    </head>
    <body>
        <p style="font-size:1.1em;">Si no eres redireccionado, haz clic <a href="{{route($route?? $ruta)}}">aquí</a></p>
        <script>
            document.onLoad=location.href="{{route($route?? $ruta )}}";
        </script>
    </body>
</html>