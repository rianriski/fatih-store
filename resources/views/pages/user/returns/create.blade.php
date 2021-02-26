@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Apply for Refund</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('user.returns.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="invoice_id" class="">Invoice</label>
          <select name="invoice_id" id="invoice_id" class="form-control form-control-sm w-auto">
            <option value="0" disabled selected>-- Select Invoice --</option>
            @foreach ($invoices as $invoice)
            <option value="{{ $invoice->id }}">{{ $invoice->transaction_uuid }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="reason" class="form-control-label">Reason</label>
          <textarea name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror">{{ old('reason') }}</textarea>
          @error('reason')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="courier" class="">Courier</label>
              <select name="courier" id="courier" class="form-control form-control-sm w-auto">
                <option value="0" disabled selected>-- Select Courier --</option>
                <option value="jne">JNE</option>
                <option value="pos">Pos Indonesia</option>
              </select>
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="receipt" class="form-control-label">Receipt</label>
              <input type="text" name="receipt" id="receipt" value="{{ old('receipt') }}" class="form-control @error('receipt') is-invalid @enderror">
              @error('receipt')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row mt-4">
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
              <button class="btn btn-primary btn-block" type="submit">Apply</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('user.returns') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection