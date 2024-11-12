<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;  
use App\View\Components\AppLayout;  
use Illuminate\Support\Facades\URL; 
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
      Paginator::useBootstrap();
      \URL::forceScheme('https'); 
      $this->app['request']->server->set('HTTPS','on');
    }
    
    public function register(): void
    {
        //
    }

}
