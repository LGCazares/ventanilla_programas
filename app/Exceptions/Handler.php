<?php

namespace App\Exceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Models\Correo;
use App\AdipUtils\MailFactory;
use Illuminate\Auth\AuthenticationException;
use App\AdipUtils\Engine;
use App\AdipUtils\ErrorLoggerService as Logg;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $exception)
    {
        parent::report($exception);

        if( config('app.debug')===false &&
            config('engine.mailing_errors')!='' &&
            (
               $exception instanceof \Error // Parse errors, class not found y similares
            || $exception instanceof \ErrorException // Errores lanzados en tienmpo de ejecucion con trigger_error()
            || $exception instanceof \Illuminate\Database\QueryException // Errores de Base de Datos
            || $exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException // Subida de archivos excede tamaño
            || $exception instanceof \UnexpectedValueException // Valores no esperados
            || $exception instanceof LlaveException // LlaveCDMX
            )
        ){
            Logg::log(__METHOD__,$exception->getMessage(), 0);
            MailFactory::sendMail(
                new Correo([
                    'tx_from' => config('mail.from.address')
                    ,'tx_to' => config('engine.mailing_errors')
                    ,'tx_subject' => 'Informe de error en '.config('app.name')
                    ,'tx_body' => view('errors.report')->with(compact('exception'))->render()
                    ,'nu_priority' => 1
                ])
            );
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if( config('app.debug')===false &&
            (
            $exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException
            || $exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException
            )
        ){
            return response()->view("partials.engine.runtime-error", ['exception' => $exception], 500);
        }else{
            return parent::render($request, $exception);
        }
    }


    /**
     * Redirigir si no se está autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  AuthenticationException  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if ($request->is(Engine::guestZone()) || $request->is(Engine::guestZone() . '/*')) {
            return redirect()->guest(Engine::guestZone().'/login');
        }
        return redirect()->guest(route('login'));
    }
}
