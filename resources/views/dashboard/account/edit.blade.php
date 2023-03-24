@extends('dashboard.layouts.main')
@section('container')

<div class="col-lg-8">
    <h1 class="h2">Edit Post</h1>
    <form action="/dashboard/account/{{ $user->id }}" method="post" class="mb-5 mt-3" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$user->name) }}" required>
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username',$user->username) }}" required>
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$user->email) }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Profile Picture</label>
          <input type="hidden" name="oldImage" value="{{ $user->image }}">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          @if($user->image)
          <img src='{{ asset('storage/' . $user->image) }}' class="img-preview img-fluid my-3 col-sm-5" style="display:block">
          @else
          <img class="img-preview img-fluid my-3 col-sm-5" style="display:block">
          @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Account</button>
      </form>
  </div>
  
  <script>

    document.addEventListener('trix-file-accept', (e) => {
        e.preventDefault();
    })

    function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector(".img-preview");


    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = (oFREvent) => {
      imgPreview.src = oFREvent.target.result;
      }

    }

  </script>
@endsection