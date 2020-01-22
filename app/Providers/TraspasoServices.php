<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\models\TraspasoRepository;
class TraspasoServices extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("traspaso.create",function($view){
          
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
