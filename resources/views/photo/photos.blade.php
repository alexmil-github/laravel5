@extends('layouts.app')

@section('content')

        <h1 class="text-center text-white">{{ $album->title }}</h1>


        @if (count($data) > 0)
            <hr>

                            <div class="row">
                                @foreach($data as $item)
                                <div class="col-md-4" thumb>
                                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{ $item->title }}" data-description="{{ $item->description }}"
                                       data-image="{{ $item->path }}" data-target="#image-gallery">
                                        <img class="img-thumbnail"
                                             src="{{ $item->path }}"
                                             alt="{{ $item->title }}">
                                    </a>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form action="../photo/{{ $item->id }}" method="GET" >
                                                @csrf
                                                <button class="btn btn-primary" >редактировать</button>
                                            </form>
                                        </div>
                                        <div class="col-md-4">
                                            <form action="../photo/{{ $item->id }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" >удалить</button>
                                            </form>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <form action="" method="POST" >
                                                @csrf
                                                <label for="photo-{{ $item->id }}"><div class="btn btn-outline-primary" ><input  id="photo-{{ $item->id }}" type="checkbox"></div></label>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>

                                </div>


                                @endforeach

                            </div>


        @endif

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
                                <label for="image">Загрузка изображения:</label>
                                <input type="file"  id="image" name="image">
                                <small class="form-text text-muted">фото в формате jpg, png.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Загрузить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{--modal--}}
        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        <hr>
                        <p class="text-center" id="image-gallery-description"></p>
                    </div>
                    <div class="modal-footer">
                        <h6 class="modal-title" id="image-gallery-description"></h6>
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{--end modal--}}

@endsection
