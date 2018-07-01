@extends('layouts.dashboard')

@section('products')
    @parent

    <h4>Тэги</h4>
    @foreach($tags as $tag)
        <div class="row" style="margin-bottom: .25rem;">
        <div class="col-md-9">{{$tag->title}}</div>
        <div class="col-md-3" style="text-align: right;">
            <a class="btn btn-basic btn-sm" role="button" href="{{route('tags.edit', $tag->id)}}">изменить</a>&nbsp
            {{Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete','style' => 'display: inline;'])}}
            <button onclick="return confirm('Точно удалить?')" type="submit" class="btn btn-basic btn-sm">удалить</button>
            {{Form::close()}}
        </div>
    </div>
    @endforeach

@endsection