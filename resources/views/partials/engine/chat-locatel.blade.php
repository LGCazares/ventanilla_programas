    @if( config('engine.locatel_enabled') && strtolower(App::environment())=='production')
    <!-- chat CDMX -->
    <script>
        var LHC_API = LHC_API||{};
        LHC_API.args = {mode:'widget',lhc_base_url:'https://chat.311locatel.cdmx.gob.mx/index.php/',wheight:450,wwidth:350,pheight:520,pwidth:500,domain:'{{config('engine.locatel_domain')}}',leaveamessage:true,check_messages:false,identifier:'{{config('app.name')}}',lang:'esp/'};
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.setAttribute('crossorigin','anonymous'); po.async = true;
            var date = new Date();po.src = 'https://chat.311locatel.cdmx.gob.mx/design/defaulttheme/js/widgetv2/index.js?'+(""+date.getFullYear() + date.getMonth() + date.getDate());
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
    @endif