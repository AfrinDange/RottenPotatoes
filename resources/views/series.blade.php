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
                <form action="">
                    <label for="basic-url">Write your review: </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Title</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Content</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <div class="pt-4">
                        <div>
                            <h6 class="font-weight-bolder">Your rating: <span>7</span></h6>
                        </div>
                        <div class="form-group">
                            <label for="formControlRange">Example Range input</label>
                            <input type="range" class="form-control-range" id="formControlRange">
                        </div>
                    </div>
                    <input class = " mt-3 btn btn-dark btn-md" type="button" value="submit">
                </form>
            </div>
        <div class="accordion" id="accordionExample">
            <div class="card bg-transparent">
                <div class="card-header" id="headingOne">
                    <div class = "row p-3">
                        <div class="col-lg-2 col-md-4">
                            <div class="d-flex">
                                <img src="https://s3.cointelegraph.com/storage/uploads/view/bad02e8b57a64d349aa5eec318298b4b.png" 
                                    width = 120 height = 120 alt="" style = "margin: auto;" class="d-flex justify-content-center img-fluid img-thumbnail rounded-circle">
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 d-flex">
                            <div class = "d-flex flex-column justify-content-start">
                                <h6 class="">canine_joe says, </h6>
                                <h4 class="font-weight-bolder">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, voluptates.</h4>
                                <button class="btn btn-link text-left m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                read more . . . 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card bg-transparent">
                <div class="card-header" id="headingTwo">
                    <div class = "row p-3">
                        <div class="col-lg-2 col-md-4">
                            <div class="d-flex">
                                <img src="https://www.thisdogslife.co/wp-content/uploads/2019/02/dog-grasshopper.png" 
                                    width = 120 height = 120 alt="" style = "margin: auto;" class="d-flex justify-content-center img-fluid img-thumbnail rounded-circle">
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 d-flex">
                            <div class = "d-flex flex-column justify-content-start">
                                <h6 class="">sue_marie says, </h6>
                                <h4 class="font-weight-bolder">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, voluptates.</h4>
                                <button class="btn btn-link text-left m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                read more . . . 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card bg-transparent">
                <div class="card-header" id="headingThree">
                    <div class = "row p-3">
                        <div class="col-lg-2 col-md-4">
                            <div class="d-flex">
                                <img src="https://s3.cointelegraph.com/storage/uploads/view/bad02e8b57a64d349aa5eec318298b4b.png" 
                                    width = 120 height = 120 alt="" style = "margin: auto;" class="d-flex justify-content-center img-fluid img-thumbnail rounded-circle">
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8 d-flex">
                            <div class = "d-flex flex-column justify-content-start">
                                <h6 class="">canine_joe says, </h6>
                                <h4 class="font-weight-bolder">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae, voluptates.</h4>
                                <button class="btn btn-link text-left m-0 p-0" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                read more . . . 
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection