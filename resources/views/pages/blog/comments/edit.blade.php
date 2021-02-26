@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Comment</strong>
    </div>
    <div class="card-body card-block">
      <h5>User Name</h5>
      <p>{{$comment->user->name}}</p>
      <hr>
      <h5>Post Title</h5>
      <p>{{$comment->post->title}}</p>
      <hr>
      <form action="{{route('comments.update', $comment->id)}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="comment" class="form-control-label">Description</label>
          <textarea name="comment" class="form-control @error('comment') is-invalid @enderror">{{ $comment->comment }}</textarea>
          @error('comment')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update</button>
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