{{--@extends('layouts.app')

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
@extends("layouts.master")

@section("contenu")
    <div class="row">
    <div class="col-12 p-4">
        <div class="jumbotron ">
                <h1 class="display-1 p-3 mb-2 bg-primary text-white"><strong>Bienvenue sur EMD AUTOMOBILE</strong> </h1>




                <hr class="my-4">

                <p class="lead">

                </p>
        </div>
    </div>
</div>
@endsection
