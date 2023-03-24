@extends('layouts.main')
@section('container')

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

<div class="d-flex justify-content-center">
    <div class="col-lg-6 main-content p-0">
        @foreach ($posts as $post)     
        <div class="card mb-3 bg-card-color">
            <div class="card-body">
                <div class="container d-flex m-0 p-0 align-items-center justify-content-start">
                    
                    @if($post->user->image)
                      <img class="rounded-circle me-3" src="{{ asset('storage/' . $post->user->image) }}" width="40" height="40" alt="">  
                    @else
                      <img class="rounded-circle me-3" src="img/Empty.jfif" width="40" height="40" alt="">  
                    @endif
                    <h6>{{ $post->user->name }}</h6>
                    
                    <form class="ms-auto" action="dashboard/bookmark" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{ $post->id }}">
                      <button class="btn btn-link text-black" type="submit" >
                        <span data-feather='bookmark'></span>
                      </button>                     
                    </form>
                   
                </div>
                <h6 class='mt-2 mb-0'> {{ $post->title }}</h6>
                <p class="mt-2 mb-0">{{ $post->body }}</p>             
            </div>

            @if($post->image)
            <div style=" overflow:hidden" >
              <img src="{{ asset('storage/' . $post->image ) }}" class="card-img-top">
            </div>
          
            @endif  
            
            <div class="card-body my-1 p-0">               
                <hr class="my-0">              
                <span class="ms-3">{{ $post->likes }} likes</span>
                <form action="/likes" method="post">
                  @csrf
                <input type="hidden" name="id" value='{{ $post->id }}'>
                <button type="submit" class="btn btn-link me-auto text-black">
                  <span data-feather="thumbs-up"></span>
                </button>
              </form>
            </div>
        
          </div>
        @endforeach
    </div>
</div>

@endsection