@extends('dashboard.layouts.main')

@section('container')
<h2>My Account</h2>
@endsection

@section('table')
@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="container">
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Name : </label>
    <div class="col-sm-10">
    <input type="text" readonly class="form-control-plaintext px-0" id="name" value="{{ $user->name }}">
    </div>
</div>

<div class="mb-3 row">
    <label for="username" class="col-sm-2 col-form-label">Username : </label>
    <div class="col-sm-10">
    <input type="text" readonly class="form-control-plaintext px-0" id="username" value="{{ $user->username }}">
    </div>
</div>

<div class="mb-3 row ">
    <label for="email" class="col-sm-2 col-form-label">Email : </label>
    <div class="col-sm-10">
    <input type="text" readonly class="form-control-plaintext" id="email" value="{{ $user->email }}">
    </div>
</div>


<div class="mb-3 row" >
    <label class="col-sm-2 col-form-label">Profile Picture : </label>
    <div style="max-width:120px; max-height:120px">
    
    @if($user->image)
    <img class="rounded-circle p-0"  src="{{ asset('storage/' . $user->image) }}" alt="sad" width="120" height="120">
    @else
    <img class="rounded-circle p-0"  src="../img/Empty.jfif" alt="sad" width="120" height="120">
    @endif

</div>
</div>
<a class="btn btn-primary mt-3" href="/dashboard/account/{{ $user->id }}/edit" role="button">Edit Account</a>

</div>
@endsection