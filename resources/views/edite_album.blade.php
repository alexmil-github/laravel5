@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование альбома</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ $data->id }}/update" method="post" class="form-horizontal">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Название:</label>
                            <input type="text" name="title" id="title" value="{{ $data->title }}" class="form-control">
                        </div>

                        <button class="btn btn-primary">Изменить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
