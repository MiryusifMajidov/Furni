<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\Image\Image;


class HeaderSetting extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\HeaderSetting>
     */
    public static $model = \App\Models\HeaderSetting::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            // English Name Field
            Text::make('Name (English)', 'name_en')
                ->rules('required', 'max:255'),

            // Russian Name Field
            Text::make('Name (Russian)', 'name_ru')
                ->rules('required', 'max:255'),

            // Azerbaijani Name Field
            Text::make('Name (Azerbaijani)', 'name_az')
                ->rules('required', 'max:255'),

            // Turkish Name Field
            Text::make('Name (Turkish)', 'name_tr')
                ->rules('required', 'max:255'),

            // The rest of your fields
            Text::make('URL')
                ->rules('required', 'url'),
            Boolean::make('Is Active'),

            \Laravel\Nova\Fields\Image::make('Header Logo')
                ->disk('public') // specify the disk if necessary
                ->path('header_logos') // specify the path within the disk
                ->prunable(),

            Text::make('Icon Name')
                ->rules('required', 'max:255'), // Use for displaying translated icon names



            // Language-specific fields, if not using translations
            // Text::make('Name (English)', 'name_en'),
            // Text::make('Name (Russian)', 'name_ru'),
            // Text::make('Name (Azerbaijani)', 'name_az'),
            // Text::make('Name (Turkish)', 'name_tr'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
