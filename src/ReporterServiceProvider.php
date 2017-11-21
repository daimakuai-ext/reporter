<?php

namespace Jblv\Admin\Reporter;

use Illuminate\Support\ServiceProvider;

class ReporterServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'daimakuai-ext-reporter');

        if ($this->app->runningInConsole()) {
            $this->publishes(
                [__DIR__.'/../resources/assets/' => public_path('vendor/daimakuai-ext-reporter')],
                'daimakuai-ext-reporter'
            );

            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }

        Reporter::boot();
    }
}
