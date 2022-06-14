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
        $this->app->singleton('lineloginGetdata',function($app,$parameter){
            $config = new ConfigManager();
            $auth = new OAuthController($config);
            $authorization = new LineAuthorization($config);
            $data = $auth->getDecodeIdData($parameter[0],true);
            return $data;
        });
        $this->app->singleton('lineloginGetprofile',function($app,$parameter){
            $config = new ConfigManager();
            $auth = new OAuthController($config);
            $profile = new LineProfileController($config);
            $token = $auth->getAccessToken($parameter[0]);           
            $info = $profile->getUserprofile($token); 
            return $info;
        });
        $this->app->singleton('lineloginUrl',function(){
            $config = new ConfigManager();
            $authorization = new LineAuthorization($config);
            return $authorization->createAuthUrl();
        });
        
        $this->app->singleton('lineloginConfig',function(){
            return new ConfigManager();
        });
        $this->app->singleton('lineloginAuthorization',function($config){
            return new LineAuthorization($config);
        });
        $this->app->singleton('lineloginProfile',function($config){
            return new LineProfileController($config);
        });
        $this->app->singleton('lineloginOAuth',function($config){
            return new OAuthController($config);
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
        $route = '/vendor/linelogin';
        $this->loadViewsFrom(__DIR__.'/views','linelogin'); 
        $this->publishes([ 
            __DIR__.'/views' => base_path('resources/views'.$route), 
        ]); 
        $this->publishes([
            __DIR__.'/img' => public_path($route),
        ], 'public');
    }
}
