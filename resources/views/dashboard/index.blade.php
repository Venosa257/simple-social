@extends('dashboard.layouts.main')

@section('container')
<h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
@endsection