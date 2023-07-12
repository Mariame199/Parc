@extends('layouts.auth')

@section('container')
<div class="login-box">
    <div class="login-logo">
    <a href="../../index2.html"><b>EMD-AUTOMOBILE</b></a>
    </div>
<div class="card">
    <div class="card-body login-card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf
    <div class="input-group mb-3">
        <input type="email"placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-envelope"></span>
    </div>
    </div>
    </div>
    <div class="input-group mb-3">
        <input type="password"placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    <div class="input-group-append">
    <div class="input-group-text">
    <span class="fas fa-lock"></span>
    </div>
    </div>
    </div>

    <div class="col">
    <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
    </div>

    </div>
    </form>


    </div>
    </div>
@endsection
