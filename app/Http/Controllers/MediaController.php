<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function index() {
        $data = \App\Media::all();
        return view('welcome',compact('data'));

    }
}
