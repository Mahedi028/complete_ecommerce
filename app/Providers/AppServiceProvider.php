<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\ProductInterface;
use App\Repositories\ProductRepositories;
use App\Interfaces\UserInterface;
use App\Repositories\UserRepositories;
use App\Interfaces\CategoryInterface;
use App\Repositories\CategoryRepositories;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //ide helper
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        $this->app->bind(ProductInterface::class, ProductRepositories::class);
        $this->app->bind(UserInterface::class, UserRepositories::class);
        $this->app->bind(UserInterface::class, UserRepositories::class);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('categories')) {
            $categories=Category::select(['name', 'slug'])->where('category_id', null)->get();
            view()->share('categories', $categories);
        }
    }
}
