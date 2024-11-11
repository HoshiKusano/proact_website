<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;  
use App\View\Components\AppLayout;  
use Illuminate\Support\Facades\URL; 

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
      \URL::forceScheme('https'); 
      $this->app['request']->server->set('HTTPS','on');
    }
    
    public function register(): void
    {
        //
    }

}
