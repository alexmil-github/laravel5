@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ $album->title }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Загрузка фото</div>
                    <div class="card-body">
                        <form action="../{{ $album->id }}/photos" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Название фото</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" id="image" name="image">
                                <small class="form-text text-muted">фото в формате jpg, png.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Загрузить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Фото</div>
                    <div class="card-body">
                        <div class="row">

                            @if (count($data) > 0)
                                привет
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
