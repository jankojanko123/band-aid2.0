<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index() {
        $data = \App\Artist::all();
        return view('welcome',compact('data'));

    }
}
