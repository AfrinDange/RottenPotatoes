@extends('layouts.page')

@section('content')
    {{-- <h3 class="display-3 text-center">Welcome To Rotten Potatoes!</h3> --}}
    <div class="d-flex justify-content-center" style="max-height: 90vh;"> 
        <img src="images/movies.jpg" class="img-fluid w-100" alt="">
    </div>
    {{-- <p class="lead justify-content text-center">
        Rotten Potatoes is a new community for reviewing movies and tv series! 
        <br>
        You can find what to watch next here as well as provide suggestions to fellow users.
        <br>
        <strong class="font-bold">Get the critic in you free and post reviews about anything and everything you have every watched.</strong>
    </p>
    <br>
    <p class="text-center font-italic">
        Welcome to the community :)
    </p> --}}
@endsection
            {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif --}}

            