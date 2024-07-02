<?php

namespace App\Providers;

use App\Auth\Guards\LlaveGuard;
use App\Policies\TramitePolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\{Auth, Gate, RateLimiter, URL};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $app_env = config('app.env');
        if ($app_env != 'local'){
            URL::forceScheme('https');
            request()->server->set('HTTPS', request()->header('X-Forwarded-Proto', 'https') == 'https' ? 'on' : 'off');
        }

        Auth::extend('llave', function(Container $app){
            return new LlaveGuard($app['request']);
        });

        Gate::define('ver-tramite', [TramitePolicy::class, 'ver']);
        Gate::define('editar-tramite', [TramitePolicy::class, 'editar']);
        Gate::define('calificar-tramite', [TramitePolicy::class, 'calificar']);
        Gate::define('agregarObservaciones-tramite', [TramitePolicy::class, 'agregarObservaciones']);
        Gate::define('visualizarObservaciones-tramite', [TramitePolicy::class, 'visualizarObservaciones']);
        Gate::define('bandeja-editar-tramite', [TramitePolicy::class, 'bandejaEditar']);

        $this->configureRateLimiting();

        Paginator::useBootstrapFour();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(1000)->by($request->user()?->id ?: $request->ip());
        });
    }
}
