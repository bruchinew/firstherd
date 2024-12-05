<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $namespace = 'App\\Http\\Controllers';
    public function register(): void
    {
        //
    }
    public function map()
    {
        $this->mapApiRoutes();

        // Other route mappings...
    }

    protected function mapApiRoutes()
    {
        dd('mapApiRoutes');
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');  // Force HTTPS in production
        }

    }
}
