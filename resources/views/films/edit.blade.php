@extends('layouts.films')

@section('films')
    @parent

    <div class="row">
        <div class="form-group offset-md-2 col-md-8">
            <h4>Редактровать фильм</h4>
        </div>
    </div>

    {!! Form::open(['route' => ['films.update', $film->id], 'method' => 'put']) !!}
        @csrf
        <div class="row">
            <div class="form-group offset-md-2 col-md-8">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title" value="{{$film->title}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group offset-md-2 col-md-8">
                <label for="year">Год</label>
                <input type="number" class="form-control" name="year" value="{{$film->year}}">
            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="form-group offset-md-2 col-md-8">--}}
                {{--<label for="Name">Теги</label>--}}
                {{--<input type="text" class="form-control" name="tags">--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
          <div class="form-group offset-md-5 col-md-2">
            <button type="submit" class="btn btn-success" style="width: 100%">Сохранить</button>
          </div>
        </div>
    {!! Form::close() !!}

    @include('films.errors');

@endsection
