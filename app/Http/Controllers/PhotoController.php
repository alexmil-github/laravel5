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
        return (view('photos', ['album' => $album, 'data' => $data]));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function public(Photo $photo, Album $albums, Request $request)
    {
       // $public_albums = Album::all()->where('is_public', "=", "1"); //Создаем массив из публичных альбомов


        $public_photos = Photo::whereHas('album', function($query){
            $query->where('is_public', 1);
        })->get();




  //      $data=[];

       //перебираем элементы массива публичных альбомов
//        foreach ($public_albums as $public_album) {
            //Вытаскиваем фото из текущего публичного альбома
      //     $items = $public_album->photos;
           // $item= Photo::all()->where('album_id', '=', $public_album->id);
          //  dd(count($items));
      //  $data = array_merge($data, $item);

//        }

     return (view('welcome', ['data' => $public_photos]));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Photo $photo)
    {

//        Storage::delete($photo->path);
        Storage::disk('public')->delete(basename($photo->path));

        $photo->delete();
      return redirect($photo->album_id.'/photo');
    }

}
