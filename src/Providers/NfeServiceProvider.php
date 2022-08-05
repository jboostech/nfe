<?php

namespace Boostech\Nfe\Providers;

use Illuminate\Support\ServiceProvider;

class NfeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->make('Boostech\Nfe\Controllers\HnfexController'); // Namespace\NomeController
        //$this->loadViewsFrom(__DIR__ . '/views', 'calculator');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    public function boot()
    {
        include __DIR__ . '/../routes/web.php';
    }
}
