@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Receipt Information</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('receipts.update', $receipt->id)}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="invoice_id" class="form-control-label">Transaction UUID</label>
          <input disabled type="text" id="invoice_id" name="invoice_id" value="{{ $receipt->invoice->transaction_uuid }}" class="form-control @error('invoice_id') is-invalid @enderror">
          @error('invoice_id')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="courier" class="form-control-label">Courier</label>
          <input disabled type="text" name="courier" value="{{ $receipt->invoice->courier }}" class="form-control @error('receipt') is-invalid @enderror">
          @error('receipt')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="receipt" class="form-control-label">Receipt</label>
          <input type="text" name="receipt" value="{{ $receipt->receipt }}" class="form-control @error('receipt') is-invalid @enderror">
          @error('receipt')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update Receipt</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('receipts') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection