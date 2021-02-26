@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Create Message</strong>
    </div>
    <div class="card-body card-block">
      <h5>Your Ticket</h5>
      <p class="mt-3 badge badge-primary p-2">{{ $ticket }}</p>
      <hr>
      <form action="{{route('user.messages.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="keyword" class="form-control-label">Keyword</label>
          <p class="blockquote-footer" style="margin-top: -10px">Please insert <cite title="Source Title">keyword/ product name/ transaction id/ etc</cite></p>
          <input type="text" name="keyword" id="keyword" value="{{ old('keyword') }}" class="form-control @error('keyword') is-invalid @enderror">
          @error('keyword')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="message" class="form-control-label">Message</label>
          <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror">{{ old('description') }}</textarea>
          @error('message')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <div class="form-group mb-3">
          <label for="photo">Upload Photo (Optional)</label>
          <input type="file" name="photo" class="form-control-file" accept="image/*" id="photo" @error('photo') is-invalid @enderror">
          @error('photo')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}" class="form-control">
        <input type="hidden" name="message_uuid" value="{{ $ticket }}" class="form-control">
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Send</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('user.messages') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection