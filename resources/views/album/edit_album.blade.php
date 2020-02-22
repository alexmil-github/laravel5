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
                        <div class="form-group">
                            <input type="hidden" id="is_public1" name="is_public" value="0" {{ ($data->is_public) == 1 ? "checked" : "" }}>
                            <input type="checkbox" id="is_public" name="is_public" value="1" {{ ($data->is_public) == 1 ? "checked" : "" }}>
                            <label for="is_public"><span>&nbsp;  Сделать публичным</span></label>
                        </div>

                        <button class="btn btn-primary">Изменить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
