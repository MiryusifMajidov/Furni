<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_name_az',
        'menu_name_en',
        'menu_name_ru',
        'menu_url',
    ];

    public $timestamps = false;

    public function getMenuAttribute()
    {
        $locale = App()->getLocale();
        $menu = "menu_name_{$locale}";
        return $this->{$menu};
    }
}
