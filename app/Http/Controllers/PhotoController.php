<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index(Album $album, Request $request)
    {
//    $data = Photo::all();
        $data = $album->photos;
        return (view('photo.photos', ['album' => $album, 'data' => $data]));
    }


    public function public(Photo $photo)
    {
        $public_photos = Photo::whereHas('album', function($query){
            $query->where('is_public', 1);
        })->get();
     return (view('welcome', ['data' => $public_photos]));
    }


    public function edit(Photo $photo)
    {
        return (view('photo.edit_photo', ['data' => $photo]));
    }


    public function update(Request $request, Photo $photo)
    {
        $photo->update($request->all());
        return redirect($photo->album_id.'/photo');
    }


    public function destroy(Photo $photo)
    {

//        Storage::delete($photo->path);
        Storage::disk('public')->delete(basename($photo->path));

        $photo->delete();
        return redirect($photo->album_id.'/photo');
    }

}
