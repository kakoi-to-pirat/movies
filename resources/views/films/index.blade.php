@extends('layouts.dashboard')

@section('products')
    @parent

    @foreach($tags as $tag)
        @if ($tag->getFilmsTitles() !== 'Нет фильмов')
            <h4>{{$tag->title}}</h4>
            @foreach($films as $film)
                @if (stristr($film->getTagsTitles(), $tag->title))
                    <div class="row" style="margin-bottom: .25rem;">
                        <div class="col-md-4">{{$film->title}}</div>
                        <div class="col-md-1">{{$film->year}}</div>
                        <div class="col-md-4">{{$film->getTagsTitles()}}</div>
                        <div class="col-md-3" style="text-align: right;">
                            <a class="btn btn-basic btn-sm" role="button" href="{{route('films.edit', $film->id)}}">изменить</a>&nbsp
                            {{Form::open(['route' => ['films.destroy', $film->id], 'method' => 'delete','style' => 'display: inline;'])}}
                                <button onclick="return confirm('Точно удалить?')" type="submit" class="btn btn-basic btn-sm">удалить</button>
                            {{Form::close()}}
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach

    @foreach($films as $film)
        @if ($film->getTagsTitles() === null)
            <div class="row" style="margin-bottom: .25rem;">
                <div class="col-md-4">{{$film->title}}</div>
                <div class="col-md-1">{{$film->year}}</div>
                <div class="col-md-4">Нет тегов</div>
                <div class="col-md-3" style="text-align: right;">
                    <a class="btn btn-basic btn-sm" role="button" href="{{route('films.edit', $film->id)}}">изменить</a>&nbsp
                    {{Form::open(['route' => ['films.destroy', $film->id], 'method' => 'delete','style' => 'display: inline;'])}}
                    <button onclick="return confirm('Точно удалить?')" type="submit" class="btn btn-basic btn-sm">удалить</button>
                    {{Form::close()}}
                </div>
            </div>
        @endif
    @endforeach

@endsection
