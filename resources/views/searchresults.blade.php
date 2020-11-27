@extends('layouts.app')

@section('content')
<div class="display-4 pt-5 font-weight-bold text-center">Search Results found {{ $count }}</div>
    @if ($resultFound) 
        @if ($movies->count() > 0)
        <h2 class="pl-5 font-weight-bold">Movies Found: </h2>
        <div class="row d-flex justify-content-start p-5">
            @foreach ($movies as $movie)
            <div class="col-md-2 col-sm-4 d-inline-flex p-2 justify-content-center">
                <div class="card border border-dark shadow" style="width: 10rem;">
                    <img src="data:image/png;base64, {{ $movie->poster }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="/movies/{{$movie->imdbID}}" class="">{{ $movie->title }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @if ($tvseries->count() > 0)
        <h2 class="pl-5 font-weight-bold">TV Series Found: </h2>
        <div class="row d-flex justify-content-start p-5">
            @foreach ($tvseries as $show)
            <div class="col-md-2 col-sm-4 d-inline-flex p-2 justify-content-center">
                <div class="card border border-dark shadow" style="width: 10rem;">
                    <img src="data:image/png;base64, {{ $show->poster }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="/tvseries/{{$show->imdbID}}" class="">{{ $show->title }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @if ($actors->count() > 0)
        <h2 class="pl-5 font-weight-bold">Actors Found: </h2>
        <div class="row d-flex justify-content-start p-5">
            @foreach ($actors as $actor)
            <div class="col-md-2 col-sm-4 d-inline-flex p-2 justify-content-center">
                <div class="card border border-dark shadow" style="width: 10rem;">
                @if ($actor->headshot == "")
                    <img src="/images/placeholder.png"
                        class="card-img-top" alt="...">
                @else
                    <img src="data:image/png;base64, {{ $actor->headshot }}"
                    class="card-img-top" alt="...">
                @endif
                    <div class="card-body">
                    <a href="/actor/{{$actor->imdbID}}" class="">{{ $actor->name }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>    
        @endif
    @endif

    
@endsection