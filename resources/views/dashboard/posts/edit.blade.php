@extends('dashboard.layouts.main')

@section('container')



    
   


<div class="col-lg-8">
    <h1 class="h2">Edit Post</h1>
    <form action="/dashboard/posts/{{ $post->id }}" method="post" class="mb-5 mt-3" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$post->title) }}" required>
          @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Post Image</label>
          <input type="hidden" name="oldImage" value="{{ $post->image }}">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          @if($post->image)
          <img src='{{ asset('storage/' . $post->image) }}' class="img-preview img-fluid my-3 col-sm-5" style="display:block">
          @else
          <img class="img-preview img-fluid my-3 col-sm-5" style="display:block">
          @endif
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>       

            <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
      </form>
  </div>
  
  <script>
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');
    
    title.addEventListener('change', () => {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })

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