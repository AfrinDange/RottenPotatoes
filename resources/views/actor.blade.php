@extends('layouts.page')

@section('content')
<div class="d-flex justify-content-center m-4">
    <div class="d-flex m-3">
        <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4 ">
                <img src="data:image/png;base64, {{ $actor[0]->headshot }}" class="card-img h-100" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title font-weight-bold" style="font-size: 2rem;">{{ $actor[0]->name }}</h5>
                <p class="card-text">Originally from {{ $actor[0]->birthNotes }}</p>
                <p class="card-text"><small class="text-muted">Born on {{ $actor[0]->birthdate }}</small></p>
            </div>
            </div>
        </div>
        </div>        
    </div>
</div>
<div class="jumbotron jumbotron-fluid pl-5 pr-5 ml-5 mr-5 rounded" style = "margin-top: -12rem; padding-top: 10rem;">
    @if ($actor[0]->trademark != "")
        <blockquote class="blockquote">
            <p class="mb-0">
                {{ $actor[0]->trademark }}
            </p>
            <footer class="blockquote-footer"><cite title="Source Title">  Trademarks</cite></footer>
        </blockquote>  
    @endif  
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <p class="font-weight-bold" style="font-size: 2rem;" >Biography: </p>
            <blockquote class="blockquote">
                <p class="mb-0">
                    {{ $actor[0]->bio[0] }}
                </p>
                <footer class="blockquote-footer"><cite title="Source Title">{{ $actor[0]->bio[1] }}</cite></footer>
            </blockquote>  
            <div>
                @if (count($movies) > 0)
                <h2 class="pl-5 font-weight-bold">Movies Done: </h2>
                <div class="row d-flex justify-content-start p-5">
                    @foreach ($movies as $movie)
                    <div class="col-md-4 col-sm-6 d-inline-flex p-2 justify-content-center">
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
                @if (count($tvseries) > 0)
                <h2 class="pl-5 font-weight-bold">TV Series Done: </h2>
                <div class="row d-flex justify-content-start p-5">
                    @foreach ($tvseries as $show)
                    <div class="col-md-4 col-sm-6 d-inline-flex p-2 justify-content-center">
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
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <p class="font-weight-bold" style="font-size: 2rem;">Quotes: </p>
            @if (count($actor[0]->quotes) > 1)
            <ul class="list-group list-group-flush bg-transparent ">
                @foreach ($actor[0]->quotes as $quote)
                    <li class="list-group-item bg-transparent">{{ $quote }}</li>
                @endforeach
            </ul>
            @else
            <p class="alert alert-info">No quotes recorded from this actor.</p>
            @endif
        </div>
    </div>
</div>
@endsection