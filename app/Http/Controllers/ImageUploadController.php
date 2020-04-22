<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('artist/imageUpload');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        return redirect('/');
    }
}
