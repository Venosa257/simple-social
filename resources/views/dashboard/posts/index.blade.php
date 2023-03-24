@extends('dashboard.layouts.main')

@section('table')
<h2>My Posts</h2>
<div class="table-responsive mt-3">
 <a class="btn btn-primary mb-3" href="/dashboard/posts/create" role="button">Create a new post</a>
 
@if(session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

 <table class="table table-striped table-sm mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Likes</th>
      </tr>
    </thead>
    <tbody>

      @foreach($posts as $post)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td style="word-wrap: break-word;">{{ $post->title }}</td>
        <td style="word-wrap: break-word;">{{ $post->likes }}</td>
        
        <td>
          <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-info"><span data-feather='eye'></span></a>
          <a href="/dashboard/posts/{{ $post->id }}/edit" class="badge bg-warning">
            <span data-feather='edit'></span>
          </a>
          <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Delete this post?')"> 
              <span data-feather='x-circle'></span>
            </button>
           
          </form>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection