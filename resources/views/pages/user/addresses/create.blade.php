@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Create Address</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('user.shipping.addresses.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Address Title</label>
          <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="receiver" class="form-control-label">Receiver</label>
              <input type="text" name="receiver" value="{{ old('receiver') }}" class="form-control @error('receiver') is-invalid @enderror">
              @error('receiver')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="phone" class="form-control-label">Phone</label>
              <input type="number" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
              @error('phone')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="form-control-label">Address</label>
          <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
          @error('address')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="city" class="form-control-label">City</label>
              <input type="text" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror">
              @error('city')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="postal_code" class="form-control-label">Postal Code</label>
              <input type="number" name="postal_code" value="{{ old('postal_code') }}" class="form-control @error('postal_code') is-invalid @enderror">
              @error('postal_code')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
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
              <a href="{{ route('user.shipping.addresses') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection