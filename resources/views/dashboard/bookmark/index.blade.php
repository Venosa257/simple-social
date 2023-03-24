@extends('dashboard.layouts.main')

@section('table')
<h2>My Bookmark</h2>
<div class="table-responsive mt-3">
 
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
      </tr>
    </thead>
    <tbody>

      @foreach($bookmark as $bookmark)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td style="word-wrap: break-word;">{{ $bookmark->post->title }}</td>
        <td>
          <a href="/dashboard/bookmark/{{ $bookmark->id }}" class="badge bg-info"><span data-feather='eye'></span></a>
          <form action="/dashboard/bookmark/{{$bookmark->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf

            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Remove from bookmark?')"> 
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