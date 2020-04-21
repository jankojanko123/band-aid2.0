<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/submit', function () {
    return view('submit');
});


Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('artist/submit', 'ArtistController@edit');
Route::get('media/submit', 'MediaController@edit');
Route::get('foundation/submit', 'FoundationController@edit');

Route::post('artist/submit', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|max:255',
        'text' => 'required|max:255',
        'apple_music' => 'max:255',
        'spotify_id' => 'max:255',
        'youtube_id' => 'max:255',
        'band_camp_id' => 'max:255',
        'soundcloud_id' => 'max:255',
        'webpage' => 'max:255',
    ]);

    $link = tap(new App\Artist($data))->save();

    return redirect('/');
});

Route::post('media/submit', function (Request $request) {
    $data = $request->validate([
        'media_id' => 'max:255',
        'type' => 'required|max:255',
        'username' => 'max:255',
    ]);

    $link = tap(new App\Media($data))->save();

    return redirect('/');
});

Route::post('foundation/submit', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|max:255',
        'text' => 'required|max:255',
        'webpage' => 'required|max:255',
        'img' => 'required|max:255',
    ]);

    $link = tap(new App\Foundation($data))->save();

    return redirect('/');
});
