@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <div class="row d-flex">
                        <div class="col-3">
                            <img src="/images/avatar1.png" alt="" width = 150 height = 150 alt="" style = "margin: auto;"
                             class="d-flex justify-content-center bg-primary img-fluid img-thumbnail rounded-circle">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
