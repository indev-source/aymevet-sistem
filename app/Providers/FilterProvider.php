<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\models\CategoryRepository;
use App\models\BrandRepository;
use App\models\ProviderRepository;
use App\models\BusinessRepository;
class FilterProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View()->composer('products.index',function($view){
            $categoriesFilter = CategoryRepository::all();
            $providersFilter  = ProviderRepository::all();
            $brandFilter      = BrandRepository::all();
            $businessFilter   = BusinessRepository::all();
            $view->with('categoriesFilter',$categoriesFilter)->with('providersFilter',$providersFilter)->with('brandFilter',$brandFilter)->with('businessFilter',$businessFilter);
        });
    }
}
