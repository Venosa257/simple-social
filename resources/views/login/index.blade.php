@extends('layouts.main')

@section('container')


<div class="container d-flex justify-content-center align-items-center flex-column">

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" style=" width:30rem ">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

  <div class="p-5 bg-white" style=" width:30rem ">
    <h1>Login</h1>
    <form action="/login" method="post">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <small class="text-center d-block mt-3">Not Registered? <a href="/register">Register Now!</a></small>

  </div>
</div>
@endsection