<?php
namespace App\Providers;

use App\Models\Menu;
use App\Nova\Social_media;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\HeaderSetting;

class ViewServiceProvider extends ServiceProvider
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
        // Use view composer to share header settings with specific view
        View::composer('layout.header', function ($view) {
            $headerSettings = Menu::all();
            $view->with('headerSettings', $headerSettings);
        });

        View::composer('layout.footer', function ($view) {
            $social_media = \App\Models\social_media::all();
            $view->with('social_medias', $social_media);
        });
    }
}
