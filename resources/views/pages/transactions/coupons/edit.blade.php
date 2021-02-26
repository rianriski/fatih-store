@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Coupon</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('coupons.update', $coupon->id)}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Coupon Name</label>
          <input type="text" name="name" value="{{ $coupon->name }}" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="discount" class="form-control-label">Discount</label>
          <input type="number" name="discount" value="{{ $coupon->discount }}" class="form-control @error('discount') is-invalid @enderror">
          @error('discount')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description" class="form-control-label">Description</label>
          <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{$coupon->description}}</textarea>
          @error('description')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update Coupon</button>
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