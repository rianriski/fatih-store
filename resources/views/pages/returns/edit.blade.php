@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Return Request</strong>
    </div>
    <div class="card-body card-block">
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="invoice_id" class="form-control-label">Invoice UUID</label>
          <input disabled type="text" name="invoice_id" value="{{ $return->uuid }}" id="invoice_id" class="form-control @error('invoice_id') is-invalid @enderror">
          {{-- jika error tampilkan message --}}
          @error('invoice_id')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="reason" class="form-control-label">Reason</label>
          <textarea name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror">{{ $return->reason }}</textarea>
          @error('reason')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="courier" class="">Courier</label>
              <input disabled type="text" name="courier" value="{{ $return->courier }}" id="courier" class="form-control @error('courier') is-invalid @enderror">
              @error('courier')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="receipt" class="form-control-label">Receipt</label>
              <input type="text" name="receipt" id="receipt" value="{{ $return->receipt }}" class="form-control @error('receipt') is-invalid @enderror">
              @error('receipt')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <h5 class="mt-3">Supporting Images</h5>
        <div class="row mt-3">
          <div class="col col-lg-4 col-md-4 col-sm-12 border-right border-dark pl-4">
            <div class="form-group">
              <label for="photo_1">Main Photo</label>
              <input type="file" name="photo_1" class="form-control-file" accept="image/*" id="photo_1" @error('photo_1') is-invalid @enderror">
              @error('photo_1')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-4 col-md-4 col-sm-12 border-right border-dark">
            <div class="form-group">
              <label for="photo_2">Secondary Photo (Optional)</label>
              <input type="file" name="photo_2" class="form-control-file" accept="image/*" id="photo_2" @error('photo_2') is-invalid @enderror">
              @error('photo_2')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-4 col-md-4 col-sm-12 border-dark">
            <div class="form-group">
              <label for="photo_3">Third Photo (Optional)</label>
              <input type="file" name="photo_3" class="form-control-file" accept="image/*" id="photo_3" @error('photo_3') is-invalid @enderror">
              @error('photo_3')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Save</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('returns') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection