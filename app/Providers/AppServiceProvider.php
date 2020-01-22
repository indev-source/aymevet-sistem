<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\models\ProductRepository;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // servicio que me obtiene los productos por sucursal
        view()->composer("*",function($view){
            if(Auth::check()){
                $product = new ProductRepository();
                $productsByBusiness = $product->getProducts()->business(Auth::user()->bussine_id)->get();
                $view->with('productsByBusiness',$productsByBusiness);
            }

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
