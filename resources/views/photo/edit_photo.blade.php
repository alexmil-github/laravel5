@php
    $albums=auth()->user()->albums;
@endphp


@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование фото</div>

                <div class="card-body">

                        <img class="img-thumbnail"
                             src="{{ $data->path }}"
                             alt="{{ $data->title }}">

<hr>

                    <form action="{{ $data->id }}/update" method="post" class="form-horizontal" id="update_form">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Название:</label>
                            <input type="text" name="title" id="title" value="{{ $data->title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание:</label>
                            <input type="text" name="description" id="description" value="{{ $data->description }}"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="album_id">Альбом:</label>
                            <select id="album_id" name="album_id" class="form-control">
                                @foreach($albums as $album)
                                    <option value={{ $album->id }}>{{ $album->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </form>
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-primary" form="update_form">Изменить</button>
                        </div>
                        <div class="col-md-2">
                            <form action="../photo/{{ $data->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">удалить</button>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ url($data->album_id.'/photo') }}"><p class="btn btn-secondary">отменить</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
