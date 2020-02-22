@extends('layouts.app')

@section('content')

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
                    <hr>
                </div>


            @endforeach

        </div>


    @endif


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

