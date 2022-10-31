<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // URL::forceScheme('https');
        // Schema::defaultStringLength(191);
        // Blade::aliasComponent('admin.components.message', 'message');

        // $configuracoes = \App\Models\Configuracoes::find(1); 
        // View()->share('configuracoes', $configuracoes);

        // //Links
        // $Links = Menu::orderby('created_at', 'DESC')
        //                 ->available()
        //                 ->get();
        // View()->share('Links', $Links);
        
        // Paginator::useBootstrap();
    }
}
