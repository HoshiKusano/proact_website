<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
      \URL::forceScheme('https'); 
      $this->app['request']->server->set('HTTPS','on');//追加
    }
    
    public function register(): void
    {
        //
    }

}
