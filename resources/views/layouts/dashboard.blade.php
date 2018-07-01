@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" style="padding-top: 3px;">
                            <a href="{{ url('films') }}"
                               style="color: #212529; display: inline-block;"><h3>Фильмотека</h3></a>
                                &nbsp;&nbsp;
                            <a href="{{ url('tags') }}"
                               style="color: #212529; display: inline-block;"><h3>Тэги</h3></a>
                        </div>
                        <div class="col-md-4" style="text-align: right">
                            <a class="btn btn-info" role="button" href="{{route('tags.create')}}"
                               style="width: 48.5%; margin-top: 3px;">Добавить тэг</a>
                            <a class="btn btn-info" role="button" href="{{route('films.create')}}"
                               style="width: 48.5%; margin-top: 3px;">Добавить фильм</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @yield('products')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
