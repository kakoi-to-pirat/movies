@extends('layouts.dashboard')

@section('products')
    @parent

    <div class="row">
        <div class="form-group offset-md-2 col-md-8">
            <h4>Редактровать фильм</h4>
        </div>
    </div>

    {!! Form::open(['route' => ['films.update', $film->id], 'method' => 'put']) !!}
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
        <div class="row">
            <div class="form-group offset-md-2 col-md-8">
                {{Form::select(
                    'tags[]',
                   [ $tags ],
                   $selectedTags,
                   [
                       'style' => 'width: 100%; min-height: 180px;',
                       'multiple' => 'multiple',
                       'data-placholder' => 'Вбирите теги'
                    ]
               )}}
            </div>
        </div>
        <div class="row">
          <div class="form-group offset-md-5 col-md-2">
            <button type="submit" class="btn btn-success" style="width: 100%">Сохранить</button>
          </div>
        </div>
    {!! Form::close() !!}

    @include('helpers.errors');

@endsection
