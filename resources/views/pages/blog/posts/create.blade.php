@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Create Post</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="title" class="form-control-label">Title</label>
          <input type="text" name="title" value="{{ old('title') }}" id="name" class="form-control @error('title') is-invalid @enderror">
          @error('title')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <div class="form-group">
          <label for="category_id" class="">Category</label>
          <select name="category_id" id="category_id" class="form-control form-control-sm w-auto">
            @foreach ($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->category }}</option>
            @endforeach
          </select>
        </div>
        <hr>
        <div class="form-group">
          <label for="post" class="">Article</label>
          <textarea name="post" class="form-control ckeditor @error('post') is-invalid @enderror">{{ old('post') }}</textarea>
          @error('post')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <div class="form-group">
          <label for="status" class="form-control-label">Status</label>
          <select name="status" id="status" class="form-control form-control-sm w-auto">
            <option value="Draft">Draft</option>
            <option value="Active">Active</option>
          </select>
        </div>
        <hr>
        <div class="form-group ">
          <label for="thumbnail">Thumbnail</label>
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
              <button class="btn btn-primary btn-block" type="submit">Create</button>
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