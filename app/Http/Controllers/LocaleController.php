<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        if (array_key_exists($locale, config('app.locales'))) {
            session(['locale' => $locale]);

            if (Auth::check()) {
                $user = Auth::user();
                $user->settings()->updateOrCreate(['user_id' => $user->id], ['locale' => $locale]);
            }
        }

        return redirect()->back();
    }
}
