@extends('layouts.dashboard')

@section('products')
    @parent

    <div class="row">
        <div class="form-group offset-md-2 col-md-8">
            <h4>Добавить фильм</h4>
        </div>
    </div>

    {!! Form::open(['route' => 'films.store']) !!}
        <div class="row">
            <div class="form-group offset-md-2 col-md-8">
                <label for="title">Название</label>
                <input type="text" class="form-control" name="title">
            </div>
        </div>
        <div class="row">
            <div class="form-group offset-md-2 col-md-8">
                <label for="year">Год</label>
                <input type="number" class="form-control" name="year">
            </div>
        </div>
        <div class="row">
            <div class="form-group offset-md-2 col-md-8">
                {{Form::select('tags[]',
                   [ $tags ],
                   null,
                   [
                       'style' => 'width: 100%;',
                       'multiple' => 'multiple',
                       'data-placholder' => 'Вбирите теги'
                    ]
               )}}
            </div>
        </div>
        <div class="row">
          <div class="form-group offset-md-5 col-md-2">
            <button type="submit" class="btn btn-success" style="width: 100%">Добавить</button>
          </div>
        </div>
    {!! Form::close() !!}

    @include('helpers.errors');

@endsection
