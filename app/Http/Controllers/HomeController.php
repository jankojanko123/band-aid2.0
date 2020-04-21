<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use romanzipp\Twitch\Twitch;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $artist_data = \App\Artist::all();
        $media_data = \App\Media::all();
        $foundation_data = \App\Foundation::all();

        return view('welcome', compact('artist_data', 'media_data', 'foundation_data'));
    }
}
