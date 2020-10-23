@extends('layouts.app')

@section('content')
<div class="container d-flex d-block pt-5 m-auto justify-content-center align-items-center" >
    <div class="jumbotron jumbotron-fluid w-75 ml-lg-5 ml-md-0 p-5 mb-0 bg-gradient-info">
        <p class="display-4 text-monospace text-center">{{ __('Register') }}</p>
        <hr class="pt-3 pb-3">
        <form class = "row" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="col-lg-6 col-md-12">
                <div class="input-group mb-4 d-flex align-items-center">
                    <img id="avatarImg" src="/images/avatar1.png" class = " mr-2 d-flex-inline img-fluid img-thumbnail rounded-circle" 
                        width = 100 height = 100 alt="">
                    <div class="pt-3 form-group">
                        <div class="input-group-prepend">
                            <label for="avatar" id="avatarlabel" class="input-group-text">{{ __('Avatar') }}</label>
                            <select id="avatar" class="form-control" placeholder="avatar" name="avatar" 
                                            value="{{ old('avatar') }}" aria-label="avatarlabel" aria-describedby="avatarlabel" required autocomplete="avatar" autofocus>
                                    <option value = "1" data-img-src="/images/avatar1.png">Avatar 1</option>
                                    <option value = "2" data-img-src="/images/avatar2.png">Avatar 2</option>
                                    <option value = "3" data-img-src="/images/avatar3.png">Avatar 3</option>
                                    <option value = "4" data-img-src="/images/avatar4.png">Avatar 4</option>
                                    <option value = "5" data-img-src="/images/avatar5.png">Avatar 5</option>
                                    <option value = "6" data-img-src="/images/avatar6.png">Avatar 6</option>
                                    <option value = "7" data-img-src="/images/avatar7.png">Avatar 7</option>
                                    <option value = "8" data-img-src="/images/avatar8.png">Avatar 8</option>
                                    <option value = "9" data-img-src="/images/avatar9.png">Avatar 9</option>
                                    <option value = "10"data-img-src="/images/avatar10.png" >Avatar 10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="username" id="usernamelabel" class="input-group-text">{{ __('Username') }}</label>
                    </div>
                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="enter your username" 
                        name="username" value="{{ old('username') }}" aria-label="usernamelabel" aria-describedby="usernamelabel" required autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="birthdate" id="birthdatelabel" class="input-group-text">{{ __('Birthdate') }}</label>
                    </div>
                    <input id="birthdate" class="datepicker form-control @error('name') is-invalid @enderror" data-date-format="yyyy/mm/dd" 
                name="birthdate" value="{{ old('birthdate') }}" aria-label="birthdatelabel" aria-describedby="birthdatelabel">
                
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="input-group mb-3 mr-3">
                    <div class="input-group-prepend">
                        <label for="name" id = "namelabel" class="input-group-text">{{ __('Name') }}</label>
                    </div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="enter your name"
                            name="name" value="{{ old('name') }}" aria-label = "namelabel" aria-describedby = "namelabel" required autocomplete="name" autofocus>
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="email" id = "emaillabel" class="input-group-text">{{ __('E-Mail Address') }}</label>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" placeholder = "enter your email" aria-label="emaillabel" aria-describedby="emaillabel" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="password" id = "passwordlabel" class="input-group-text">{{ __('Password') }}</label>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="enter password"
                    name="password" aria-label="passwordlabel" aria-describedby="passwordlabel" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>   

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label for="password-confirm" id = "confirmpasswordlabel" class="input-group-text">{{ __('Confirm Password') }}</label>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" placeholder="confirm password"
                    name="password_confirmation" required autocomplete="new-password" aria-label="confirmpasswordlabel" aria-describedby="confirmpasswordlabel">
                </div>   
                <div class="input-group mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Register') }}
                    </button> 
                </div>   
            </div>
        </form>   
    </div>
</div>

@endsection