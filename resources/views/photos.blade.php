@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $album->title }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Загрузка фото</div>
                    <div class="card-body">

                       {{ $album }}


                        <form action="../{{ $album->id }}/photos" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                <small id="emailHelp1" class="form-text text-muted">Загрузка фото в формате jpg, png.</small> </div>
                            <button type="submit" class="btn btn-primary">Загрузить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
