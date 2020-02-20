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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
