<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;

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






}

