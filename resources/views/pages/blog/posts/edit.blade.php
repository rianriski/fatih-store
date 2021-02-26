@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Post</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title" class="form-control-label">Title</label>
          <input type="text" name="title" value="{{ $post->title }}" id="name" class="form-control @error('title') is-invalid @enderror">
          @error('title')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <div class="form-group">
          <label for="category_id" class="">Category</label>
          <select name="category_id" id="category_id" class="form-control form-control-sm w-auto">
            @foreach ($categories as $cat)
            <option value="{{ $cat->id }}"
              @if($cat->id === $post->category_id) selected @endif
              >{{ $cat->category }}</option>
            @endforeach
          </select>
        </div>
        <hr>
        <div class="form-group">
          <label for="post" class="">Article</label>
          <textarea name="post" id="post" class="form-control ckeditor @error('post') is-invalid @enderror">{{ $post->post }}</textarea>
          @error('post')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <div class="form-group">
          <label for="status" class="form-control-label">Status</label>
          <select name="status" id="status" class="form-control form-control-sm w-auto">
            <option value="Draft" @if($post->status == "Draft") selected @endif>Draft</option>
            <option value="Active" @if($post->status == "Active") selected @endif>Active</option>
          </select>
        </div>
        <hr>
        <div>
          <h5 class="mb-3">Current Thumbnail</h5>
          <img src="{{ url("storage/" . $post->thumbnail) }}" alt="..." class="img-thumbnail img-fluid mb-4">
        </div>
        <div class="form-group ">
          <label for="thumbnail">Update Thumbnail (Optional)</label>
          <p class="blockquote-footer">Image recomendation 1370 (width) x 768 (height)</p>
          <p class="blockquote-footer" style="margin-top: -15px">Max image size 1 mega byte</p>
          <input type="file" name="thumbnail" class="form-control-file" accept="image/*" id="thumbnail" @error('thumbnail') is-invalid @enderror">
          @error('thumbnail')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="form-control">
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('posts') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection