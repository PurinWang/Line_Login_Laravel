<?php

namespace Purin\LineLogin;

use Illuminate\Support\ServiceProvider;

class LineLoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('lineloginConfig',function(){
            return new ConfigManager;
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
