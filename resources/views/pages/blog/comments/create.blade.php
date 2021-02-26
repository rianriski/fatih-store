@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Create Comment</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('comments.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="user_id" class="">User Name</label>
          <select name="user_id" id="user_id" class="form-control form-control-sm w-auto">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <hr>
        <div class="form-group">
          <label for="post_id" class="">Post Title</label>
          <select name="post_id" id="post_id" class="form-control form-control-sm w-auto">
            @foreach ($posts as $post)
            <option value="{{ $post->id }}">{{ $post->title }}</option>
            @endforeach
          </select>
        </div>
        <hr>
        <div class="form-group">
          <label for="comment" class="form-control-label">Comment</label>
          <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
          @error('comment')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Create</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('comments') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection