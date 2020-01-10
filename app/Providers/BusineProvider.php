<?php

namespace App\Providers;

use App\Bussine;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class BusineProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*",function($view){
            if(Auth::check()){
                $business = Bussine::paginate(10);
                $view->with('bussines',$business);
            }

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
