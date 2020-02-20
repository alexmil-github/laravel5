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

    public function show(Album $album)
    {
        return (view('edite_album', ['data' => $album]));
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
        $file->move(public_path() . '/uploads', $filename); // move_uploaded_file()

        return $album
            ->photos()
            ->create(
                array_merge(
                    [
                        'url_original' => url('/public/uploads/' . $filename),
                        'url_thumb' => '',
                    ],
                    $request->all()
                )
            );
    }




}

