@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Change Password</strong>
      <p class="blockquote-footer mb-1 mt-1">password must be at least <cite title="Source Title">8 characters</cite></p>
      <p class="blockquote-footer" style="margin-top: -10px">make sure your password is not easy to guess<cite title="Source Title"></cite></p>
    </div>
    <div class="card-body card-block">
      <form action="{{route('user.password.update')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="new_password" class="form-control-label">New Password</label>
          <input type="text" name="new_password" id="new_password" value="{{ old('new_password')}}" class="form-control  @error('new_password') is-invalid @enderror" placeholder="Insert new password ...">
          @error('new_password')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group mb-4">
          <label for="password" class="form-control-label">Password Confirmation</label>
          <input type="text" name="password" id="password" value="{{ old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm new password ...">
          @error('password')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('user.profile') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection