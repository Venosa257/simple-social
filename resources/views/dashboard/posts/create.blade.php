@extends('dashboard.layouts.main')

@section('container')

<form action="/dashboard/posts" method="post" enctype="multipart/form-data">
    <h1>Create a new post</h1>
@csrf

<div class="mb-3 mt-5">
    <label for="title" class="form-label">Title</label>
    <input class="form-control" type="text" name="title" id="title" required>
    <div class="text-danger">
        @error('title') 
        {{ $message }}
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input class="form-control" type="file" name="image" id="image">
    <div class="text-danger">
        @error('image') 
        {{ $message }}
        @enderror
    </div>
</div>


<div class="mb-3 ">
    <label for="body" class="form-label">Body</label>
    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
<div class="text-danger">
    @error('body') 
    {{ $message }}
    @enderror
</div>
</div>

<input class="btn btn-primary mt-3" type="submit" value="Create post">
</form>

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