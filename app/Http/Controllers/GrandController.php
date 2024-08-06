<?php

namespace App\Http\Controllers;

use App\Models\Grand;
use App\Models\Language;
use Illuminate\Http\Request;

class GrandController extends Controller
{
    public function index()
    {
        $grands = Grand::all();
        return view('grand', compact('grands'));
    }
}
