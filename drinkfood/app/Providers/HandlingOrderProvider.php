<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HandlingOrderService;

class HandlingOrderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\HandlingOrderService', function($handlingOrderService){
            return new HandlingOrderService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
