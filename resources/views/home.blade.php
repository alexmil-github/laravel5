@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-white">Альбомы фотогалереи</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Создание нового альбома</div>

                <div class="card-body">
                        <form action="{{ auth()->user()->id }}/albums" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="name">Название:</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                            </div>

                            <button class="btn btn-primary">Добавить</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

@if (count($data) > 0)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Существующие альбомы</div>
                <div class="card-body">
                    <table class="table table-striped task-table">
                        <tbody>

                        @foreach($data as $item)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $item-> title }}</div>
                                </td>
                                <td>
                                    <p class="text-primary">{{ ($item->is_public) == 1 ? "публичный" : "" }}</p>
                                </td>
                                <td>
                                    <form action="{{url($item->id.'/photo')}}" method="GET">
                                        @csrf
                                        <button class="btn btn-outline-success" title="СМОТРЕТЬ ФОТО"><i class="fa fa-picture-o fa-3x fa-fw"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{url('albums/'.$item->id)}}" method="GET">
                                        @csrf

                                        <button class="btn btn-outline-primary" title="РЕДАКТИРОВАТЬ"><i class="fa fa-pencil-square-o fa-3x fa-fw"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="albums/{{ $item->id }}" method="POST" >
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-outline-danger" title="УДАЛИТЬ"><i class="fa fa-times fa-3x fa-fw"></i></button>

                                    </form>
                                </td>
                                <td>
                                    <form>

                                        <input type="checkbox">

                                    </form>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endif





@endsection
