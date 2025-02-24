<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // $slider = Slider::with('media')
        //     ->where('penempatan', 'Header')
        //     ->latest()
        //     ->first();

        return view('welcome');
        // return view('welcome', compact('slider'));
    }


    public function profil($slug)
    {
        $article = Articles::where('slug', $slug)->firstOrFail();

        return view('landing.profil.profil', compact('article'));
    }
}
