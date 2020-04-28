<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('artist/submit', 'ArtistController@edit');
Route::get('media/submit', 'MediaController@edit');
Route::get('foundation/submit', 'FoundationController@edit');

Route::get('artist/image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('artist/image-upload', 'ImageUploadController@index')->name('image.upload.post');

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
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    ]);

    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images/artist'), $imageName);

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
        'text' => 'required|max:600',
        'webpage' => 'required|max:255',
        'img' => 'required|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
    ]);
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images/foundation'), $imageName);


    $link = tap(new App\Foundation($data))->save();

    return redirect('/');
});

