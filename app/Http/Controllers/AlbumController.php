<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function index()
    {
        $data=auth()->user()->albums;
        return (view('home', ['data' => $data]));

    }

    public function store(Request $request)
    {
        auth()->user()->albums()->create($request->all());
        return redirect('home');

//     dd($request->get('title'));
//     dd(auth()->user()->id);

    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect('home');
    }

    public function edit(Album $album)
    {
        return (view('album.edit_album', ['data' => $album]));
    }

    public function update(Request $request, Album $album)
    {
        $album->update($request->all());
        return redirect('home');
    }

    public function uploadPhoto(Album $album, Request $request)
    {

        $file = $request->file('image'); // $_FILES['image']
        $filename = uniqid() . '.' . $file->extension();
        $file->move(public_path() . '/storage', $filename); // move_uploaded_file()
        $album
            ->photos()
            ->create(
                array_merge(
                    [
                        'path' => url('/public/storage/' . $filename),
                        'album_id' =>$album->id,
                        'owner_id' =>auth()->user()->id,
                    ],
                    $request->all()
                )
            );
        return redirect($album->id.'/photo');
    }




}

