@extends('layouts.page')

@section('content')
<div class = "container p-2 ml-5 mr-5">
    <div class="row align-items-end">
        <div class="col-lg-4 col-md-12 pl-5">
            <img src="data:image/png;base64, {{ $series[0]->poster }}"
                width = 250 height = 340 class="shadow p-0 m-5 rounded" alt="...">
        </div>
        <div class="col-lg-8 col-md-12 pb-5">
            <h1 class = "pt-5">{{ $series[0]->title }}</h1>
            <div class="row">
                <h4 class="float-left mr-3"><span class = "badge badge-warning p-2">Seasons: {{ $series[0]->seasons }}</span></h4>
                <h4 class="float-left mr-3"><span class = "badge badge-warning p-2">IMDb: {{ $series[0]->IMDBrating }}</span></h4>
            </div>
        </div>
    </div>

    <div class="jumbotron jumbotron-fluid pl-5 pr-5 rounded" style = "margin-top: -12rem; padding-top: 12rem;">
        <div class="row mb-5">
            <div class="col-lg-4 col-md-12">
                <div> <span class = "font-weight-bolder"> PLOT:       </span>{{ $series[0]->plot }}</div>
                <br>
                <div> <span class = "font-weight-bolder"> Awards:     </span>{{ $series[0]->awards }}</div>                       
            </div>
            <div class="col-lg-4 col-md-12" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Rated:      {{ $series[0]->rated }}</li>
                    <li class="list-group-item">Released:   {{ $series[0]->released }}</li>
                    <li class="list-group-item">Language:   {{ $series[0]->language }}</li>
                    <li class="list-group-item">Genre:      {{ $series[0]->genre }}</li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12" >
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Country:    {{ $series[0]->country }}</li>
                    <li class="list-group-item">Director:   {{ $series[0]->director }}</li>
                    <li class="list-group-item">Writer:     {{ $series[0]->writer }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3 class = "font-weight-bolder">Cast: </h3>
        <div class = "row d-flex justify-content-around">
            @foreach ($cast as $role)
                <div class = "row justify-content-center col-md-3 p-3">
                    @if ($role->headshot == "") 
                        <img src= "/images/placeholder.png"
                        width = 160 height = 160 class = "img-fluid img-thumbnail p-lg-2 p-md-1 shadow" alt="">
                    @else
                        <img src= "data:image/png;base64,{{ $role->headshot }}"
                        width = 160 height = 160 class = "img-fluid img-thumbnail p-lg-2 p-md-1 shadow" alt="">
                    @endif
                    <a href = "../actor/{{ $role->imdbID }}" class = "d-inline-block btn-block pt-2 p-0 m-0 text-center">{{ $role->name }}</a>
                    <p class="d-block w-100 p-0 m-0 text-center">plays</p>
                    <p class="d-block w-100 p-0 m-0 text-center">{{ $role->role }}</p>
                </div>
            @endforeach
        </div>
        <div class = "p-5">
            <h3 class="font-weight-bolder">Reviews: </h3>
            <div class = "container mb-5"> 
                <form method="POST" action="{{ route('addseriesreview', [ 'imdbID' => $series[0]->imdbID ]) }}">
                    @csrf

                    <label for="basic-url">Write your review: </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="rtitle">Title</span>
                        </div>
                        <input type="text" class="form-control" id="reviewTitle" name="title" required="" aria-describedby="rtitle">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Content</span>
                        </div>
                        <textarea class="form-control" id="reviewContent" name="content" aria-label="With textarea"></textarea>
                    </div>
                    <div class="pt-4">
                        <div class="form-group">
                            <label for="formControlRange">Your rating: </label>
                            <input type="range" class="form-control-range" name="rating" id="reviewRating">
                        </div>
                    </div>
                    @if (isset($response))
                        <div class="alert-danger p-1 m-2">{{ $response }}</div>
                    @endif
                    @if (Auth::guest())
                        <div class="alert-danger p-1 m-2">YOU NEED TO LOG IN TO ADD A REVIEW!</div>
                        <button class ="mt-3 btn btn-dark btn-md" type="submit" disabled>Submit</button>
                    @else 
                        <button class ="mt-3 btn btn-dark btn-md" type="submit">Submit</button>
                    @endif
                </form>
            </div>

        <div class="accordion" id="reviewsection"> 
            @foreach ($reviews as $review)
            <div class="card bg-transparent">
                <div class="card-header" id="title">
                    <div class = "row p-3">
                        <div class="col-lg-2 col-md-4">
                            <div class="d-flex">
                                <img src="{{ '/images/avatar'.$review->avatar.'.png' }}" 
                                    width = 120 height = 120 alt="" style = "margin: auto;" class="d-flex justify-content-center img-fluid img-thumbnail rounded-circle">
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 d-flex">
                            <div class = "d-flex flex-column justify-content-start">
                                <p style="font-size: 2rem"><a class="text-decoration-none" href="#">{{ $review->username}}</a> says,</p>
                                <h4 class="font-weight-bolder">{{ $review->title}}</h4>
                                <div class="d-flex">
                                    <label class="font-weight-bolder" for="rating">Ratings:</label>
                                    <div id="rating" class="progress bg-light m-1" style="width: 200px">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="{{ 'width: '.$review->rating.'%' }}" aria-valuenow="{{$review->rating }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <button class="btn btn-link text-left m-0 p-0" type="button" data-toggle="collapse" data-target="{{ '#reviewby'.$review->userID }}" aria-expanded="true" aria-controls="{{ 'reviewby'.$review->userID }}">
                                read more . . . 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="{{ 'reviewby'.$review->userID }}" class="collapse" aria-labelledby="title" data-parent="#reviewsection">
                    <div class="card-body">{{ $review->content }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>    
</div>
@endsection