@extends('dashboard.layouts.main')

@section('container')
<div class="col-lg-8">
<a class="btn btn-primary my-3" href="/dashboard/posts" role="button">Go back to posts</a>
<div class="card mb-3 bg-card-color">
    <div class="card-body">
        <div class="container d-flex m-0 p-0 align-items-center justify-content-start">
            @if($post->user->image)
            <img class="rounded-circle me-3" width="40" height="40" src="{{ asset('storage/' . $post->user->image) }}" alt="">  
            @else
            <img class="rounded-circle me-3" src="../../img/Empty.jfif" width="40" height="40" alt="">  
            @endif
            <h6>{{ $post->user->name }}</h6>
        </div>
        <p class="mt-2 mb-0">{{ $post->body }}</p>             
    </div>
    @if($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="...">
    @endif
    <div class="card-body my-1 p-0">

    </div>
</div>
</div>
@endsection