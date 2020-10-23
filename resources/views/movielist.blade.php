@extends('layouts.page')

@section('content')
<div class="row d-flex justify-content-around p-5">
    @foreach ($movies as $movie)
    <div class="col-md-3 col-sm-6 d-inline-flex p-2 justify-content-center">
        <div class="card border border-dark shadow" style="width: 12rem;">
            <img src="data:image/png;base64, {{ $movie->poster }}"
                class="card-img-top" alt="...">
            <div class="card-body">
            <a href="/movies/{{$movie->imdbID}}" class="">{{ $movie->title }}</a>
            </div>
        </div>
    </div>
    @endforeach
    
    
    {{-- {{$movies}} --}}
</div>
@endsection