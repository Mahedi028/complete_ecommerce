<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

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


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories=Category::select(['name', 'slug'])->where('category_id', null)->get();

        view()->share('categories', $categories);
    }
}
