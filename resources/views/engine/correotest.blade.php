<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{config('app.name')}}</title>
</head>
<body style="font-family:Arial;">
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="290">
                    <img src="{{asset('images/brand.png')}}" width="290" alt="Gobierno de la Ciudad de México | {{ config('app.name') }}">
            </td>
            <td>
                <h1 align="center" style="font-size:18px;color:#38c172 !important;">Mensaje de prueba</h1>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <p style="margin-left:15px;margin-right:15px;" align="justify">¡Hola!</p>
                            <p style="margin-left:15px;margin-right:15px;" align="justify">Si recibiste este mensaje significa que la configuración del API KEY de Mandrill es correcta.</p>
                            <p style="margin-left:15px;margin-right:15px;" align="justify">Los correos que envía la aplicacion (<em>{{ config('app.name') }}</em>) deben ser enviados sin problemas.</p>
                            <p style="margin-left:15px;margin-right:15px;" align="justify">Este correo fue enviado con la API KEY con terminación  
                            (<strong>{{ substr(config('engine.mandrillsecret'),-5) }}</strong>) en ambiente <em>{{ \App::environment() }}</em>.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="background-color: #4a4e4e;color: #ffffff;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="left">
                            <img style="margin-left:15px;" src="{{ asset('images/gobierno-y-adip.png') }}" alt="Gobierno de la Ciudad de México | Agencia Digital de Innovación Pública">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <p align="justify" style="margin-left:15px;margin-right:15px;font-size: 11px;font-weight: normal;font-stretch: normal;font-style: normal;line-height: 1.27;letter-spacing: normal;text-align: justify;color: #ffffff;padding-left: 3px;padding-right: 3px;">{{config('app.name')}}</p>
                            <p align="justify" style="margin-left:15px;margin-right:15px;font-size: 11px;font-weight: normal;font-stretch: normal;font-style: normal;line-height: 1.27;letter-spacing: normal;text-align: justify;color: #ffffff;padding-left: 3px;padding-right: 3px;">Diseñado por la Agencia Digital de Innovación Pública</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">                                                    
                <div style="font-size: 11px;font-weight: normal;font-stretch: normal;font-style: normal;line-height: 1.27;letter-spacing: normal;text-align: justify;color: #000;">
                    <p style="margin-left:15px;margin-right:15px;" align="justify"><strong>La información y/o datos contenidos en este mensaje están dirigidos de manera exclusiva al destinatario indicado</strong></p>
                    <p style="margin-left:15px;margin-right:15px;" align="justify">
                        El tratamiento de sus datos personales se realiza de conformidad con los principios de calidad, 
                        confidencialidad, consentimiento, finalidad, información, lealtad, licitud, proporcionalidad, 
                        transparencia y temporalidad, a que se refieren los artículos 16 de la Constitución Política de 
                        los Estados Unidos Mexicanos; 16, 17, 18, 19, 20, 21, 22, 23, 24 y 25 de la Ley General de 
                        Protección de Datos Personales en Posesión de Sujetos Obligados; y 9, 10, 11, 12, 17, 18 y 19 de 
                        la Ley de Protección de Datos Personales en Posesión de Sujetos Obligados de la Ciudad de México.
                    </p>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>