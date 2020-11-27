@extends('layouts.app')

@section('content')
<div class="p-3 container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark lead text-white">{{ __('Dashboard') }}</div>

                <div class="card-body bg-secondary text-white">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row align-items-end">
                        <div class="col-3">
                            <img src="{{ '/images/avatar'.$userdetails[0]->avatar.'.png' }}" alt="" width = 150 height = 150 alt="" style = "margin: auto;"
                             class="d-flex justify-content-center img-fluid img-thumbnail rounded-circle">
                        </div>
                        <div class="col-9">
                            <div><h2>{{ $userdetails[0]->name }}</h2></div>
                            <div><p class="p-0 m-0">Username: {{ $userdetails[0]->username}}</p></div>
                            <div><p class="p-0 m-0">Email ID: {{ $userdetails[0]->email }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion w-75 pt-3" id="reviewsection"> 
            @foreach ($moviesReview as $review)
            <div class="card bg-transparent pb-3">
                <div class="card-header p-0" id="title">
                    <div class = "row no-gutters">
                        <div class="col-lg-2 col-md-4">
                                <img src="data:image/png;base64, {{ $review->poster }}"
                                    class="card-img border border-dark" alt="...">
                        </div>
                        <div class="pl-5 pt-3 pr-3 col-lg-10 col-md-8 d-flex">
                            <div class = "d-flex flex-column justify-content-start w-100">
                                <p style="font-size: 1.5rem">Review For <a class="text-decoration-none" href="/movies/{{ $review->movieimdbID }}">{{ $review->movieTitle}}</a></p>
                                <h4 class="lead">{{ $review->reviewTitle}}</h4>
                                <div class="d-flex">
                                    <label class="font-weight-bolder" for="rating">Ratings:</label>
                                    <div id="rating" class="progress bg-light m-1" style="width: 200px">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="{{ 'width: '.$review->rating.'%' }}" aria-valuenow="{{$review->rating }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <button class="btn btn-link text-left m-0 p-0 font-weight-bold" type="button" data-toggle="collapse" data-target="{{ '#reviewby'.$review->movieimdbID }}" aria-expanded="true" aria-controls="{{ 'reviewby'.$review->movieimdbID }}">
                                        read more . . . 
                                    </button>
                                    <form method="POST" action="{{ route('deletemoviereview', ['userID' => $userdetails[0]->id, 'movieimdbID' => $review->movieimdbID]) }}">
                                        @csrf
                                        <button class="p-1 mr-3 btn btn-outline-danger" onclick="return confirm('Are you sure?')"><img width=25 height=25 src="/images/delete.png" alt="delete review"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="{{ 'reviewby'.$review->movieimdbID }}" class="collapse" aria-labelledby="title" data-parent="#reviewsection">
                    <div class="card-body">{{ $review->content }}</div>
                </div>
            </div>
            @endforeach
            @foreach ($tvseriesReview as $review)
            <div class="card bg-transparent pb-3">
                <div class="card-header p-0" id="title">
                    <div class = "row no-gutters">
                        <div class="col-lg-2 col-md-4">
                                <img src="data:image/png;base64, {{ $review->poster }}"
                                    class="card-img" alt="...">
                        </div>
                        <div class="pl-5 pt-3 pr-3 col-lg-10 col-md-8 d-flex">
                            <div class = "d-flex flex-column justify-content-start w-100">
                                <p style="font-size: 1.5rem">Review For <a class="text-decoration-none" href="/tvseries/{{ $review->tvseriesimdbID }}">{{ $review->showTitle}}</a></p>
                                <h4 class="lead">{{ $review->reviewTitle}}</h4>
                                <div class="d-flex">
                                    <label class="font-weight-bolder" for="rating">Ratings:</label>
                                    <div id="rating" class="progress bg-light m-1" style="width: 200px">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="{{ 'width: '.$review->rating.'%' }}" aria-valuenow="{{$review->rating }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <button class="btn btn-link text-left m-0 p-0 font-weight-bold" type="button" data-toggle="collapse" data-target="{{ '#reviewby'.$review->tvseriesimdbID }}" aria-expanded="true" aria-controls="{{ 'reviewby'.$review->tvseriesimdbID }}">
                                        read more . . . 
                                    </button>
                                    <form method="POST" action="{{ route('deletetvseriesreview', ['userID' => $userdetails[0]->id, 'tvseriesimdbID' => $review->tvseriesimdbID]) }}">
                                        @csrf
                                        <button class="p-1 mr-3 btn btn-outline-danger" onclick="return confirm('Are you sure?')"><img width=25 height=25 src="/images/delete.png" alt="delete review"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="{{ 'reviewby'.$review->tvseriesimdbID }}" class="collapse" aria-labelledby="title" data-parent="#reviewsection">
                    <div class="card-body">{{ $review->content }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
