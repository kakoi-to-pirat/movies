@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10" style="padding-top: 3px;">
                            <a href="{{ url('films') }}"style="color: #212529;"><h3>Фильмотека</h3></a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-info" role="button" href="{{route('films.create')}}" style="width: 100%; margin-top: 3px;">добавить фильм</a></div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @yield('films')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
