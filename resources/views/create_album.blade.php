@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Новый альбом</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="{{ auth()->user()->id }}/albums" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Название:</label>
                        <input type="text" name="title" id="title" value="{{ old('name') }}" class="form-control">
                    </div>

                    <button class="btn btn-primary">Добавить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection