<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\Image;

class ArtistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = \App\Artist::all();
        return view('welcome',compact('data'));

    }

    public function edit() {
        return view('artist/submit');
    }

}
