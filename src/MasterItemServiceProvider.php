<?php

namespace ArsoftModules\MasterItem;

use Illuminate\Support\ServiceProvider;

class MasterItemServiceProvider extends ServiceProvider 
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('ArsoftModules\MasterItem\Controllers\MasterItemController');
    }
}