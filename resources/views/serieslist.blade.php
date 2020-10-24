@extends('layouts.page')

@section('content')
<div class="row d-flex justify-content-around p-5">
    @foreach ($series as $show)
    <div class="col-md-3 col-sm-6 d-inline-flex p-2 justify-content-center">
        <div class="card border border-dark shadow" style="width: 12rem;">
            <img src="data:image/png;base64, {{ $show->poster }}"
                class="card-img-top" alt="...">
            <div class="card-body">
            <a href="/tvseries/{{$show->imdbID}}" class="">{{ $show->title }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection