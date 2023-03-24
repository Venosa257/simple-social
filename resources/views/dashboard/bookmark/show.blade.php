@extends('dashboard.layouts.main')

@section('container')
<div class="col-lg-8">
<a class="btn btn-primary my-3" href="/dashboard/bookmark" role="button">Go back to bookmark</a>
<div class="card mb-3 bg-card-color">
    <div class="card-body">
        <div class="container d-flex m-0 p-0 align-items-center justify-content-start">
            @if($bookmark->post->user->image)
            <img class="rounded-circle me-3" width="40" height="40" src="{{ asset('storage/' . $bookmark->post->user->image) }}" alt="">  
            @else
            <img class="rounded-circle me-3" src="../../img/Empty.jfif" width="40" height="40" alt="">  
            @endif
            <h6>{{ $bookmark->post->user->name }}</h6>
        </div>
        <p class="mt-2 mb-0">{{ $bookmark->post->body }}</p>             
    </div>
    @if($bookmark->post->image)
    <img src="{{ asset('storage/' . $bookmark->post->image) }}" class="card-img-top" alt="...">
    @endif
    <div class="card-body my-1 p-0">

    </div>
</div>
</div>
@endsection