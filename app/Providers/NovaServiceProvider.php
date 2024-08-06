<?php

namespace App\Providers;

use App\Nova\Blog;
use App\Nova\Brand;
use App\Nova\Category;
use App\Nova\Customers;
use App\Nova\Grand;
use App\Nova\HeaderSetting;
use App\Nova\Language;
use App\Nova\License;
use App\Nova\MenuSetting;
use App\Nova\OurTeam;
use App\Nova\Product;
use App\Nova\Release;
use App\Nova\Series;
use App\Nova\Social_media;
use App\Nova\Testimonials;
use App\Nova\Translation;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Panel;
use Outl1ne\NovaSettings\NovaSettings;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();


        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),

                MenuSection::make(__('Customers'), [
                    MenuItem::resource(User::class),
//                    MenuItem::resource(License::class),
                ])->icon('user')->collapsable(),

                MenuSection::make(__('Məhsullar'), [
                    MenuItem::resource(Brand::class),
                    MenuItem::resource(Category::class),
                    MenuItem::resource(Product::class),
                ])->icon('document-text')->collapsable(),
                MenuSection::make(__('Blog'), [
                    MenuItem::resource( Blog::class),
                ])->icon('pencil-alt')->collapsable(),
                MenuSection::make(__('OurTeam'), [
                    MenuItem::resource( OurTeam::class),
                    MenuItem::resource( Customers::class),
                    MenuItem::resource( Testimonials::class),
                ])->icon('collection')->collapsable(),

                MenuSection::make(__('Mega Settings'), [
//                    MenuItem::resource(HeaderSetting::class),
                    MenuItem::resource(MenuSetting::class),
                    MenuItem::resource(Social_media::class),
                    MenuItem::resource(Language::class),
                    MenuItem::resource(Grand::class),

                ])->icon('cog')->collapsable(),

                MenuSection::make(__('novaSettings.navigationItemTitle'))
                    ->path('nova-settings')
                    ->icon('adjustments'),

            ];
        });

        NovaSettings::addSettingsFields([
            Panel::make('Header Settings', [
                Image::make('Footer image', 'footer_image')
                    ->disk('public')
                    ->path('footer_images')
                    ->prunable()  // Optional: To automatically delete the file if the model is deleted
                    ->rules('required', 'image', 'max:2048'), // Optional: Add validation rules
                Text::make('Header Logo', 'header_logo'),
                Text::make('Footer Logo', 'footer_logo'),
                Textarea::make('Footer Description', 'footer_description'),
                Textarea::make('Footer_end1', 'footer_end1'),
                Textarea::make('Footer_end2', 'footer_end2'),
            ]),
        ]);

    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                // authorized emails...
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new NovaSettings()
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
