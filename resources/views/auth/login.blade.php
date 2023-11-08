@extends('layouts.app')

@section('content')
<style>
  body {
    background: #f0f0f0;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }
  /* Tu estilo adicional aquí */
</style>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card" style="background-color: #808080; color: white; border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="text-center mb-4">
              <img src="{{ asset('images/OIG.png') }}" alt="Logo" width="150">
            </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-outline form-white mb-4">
                <input type="email" id="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                <label class="form-label" for="email">Email</label>
              </div>
              <div class="form-outline form-white mb-4">
                <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password" />
                <label class="form-label" for="password">Password</label>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
            </form>
            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="{{ route('password.request') }}">Forgot password?</a></p>
            <div class="d-flex justify-content-center text-center mt-4 pt-1" >
              <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
              <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
              <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
            </div>
            <div>
              <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
