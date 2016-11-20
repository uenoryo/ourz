<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DevelopmentServiceProvider extends ServiceProvider
{
    /** @var array */
    protected $providers = [
        \Barryvdh\Debugbar\ServiceProvider::class,
    ];

    public function register()
    {
        if ($this->app->isLocal()) {
            $this->registerServiceProviders();
        }
    }

    protected function registerServiceProviders()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
}
