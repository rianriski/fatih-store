@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Create Coupon</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('coupons.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Coupon Name</label>
          <input type="text" name="name" id="name" value="{{ old('coupon') }}" class="form-control @error('coupon') is-invalid @enderror">
          @error('coupon')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="discount" class="form-control-label">Discount</label>
          <input type="number" name="discount" id="discount" value="{{ old('discount') }}" class="form-control @error('discount') is-invalid @enderror">
          @error('discount')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description" class="form-control-label">Description</label>
          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
          @error('description')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Create Coupon</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('coupons') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection