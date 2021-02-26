@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Create Receipt Information</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('receipts.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="invoice_id" class="">Transaction UUID</label>
          <select name="invoice_id" id="invoice_id" class="form-control form-control-sm w-auto">
            @foreach ($invoices as $invoice)
            <option value="{{ $invoice->id }}">{{ $invoice->transaction_uuid }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="receipt" class="form-control-label">Receipt</label>
          <input type="receipt" name="receipt" id="receipt" value="{{ old('receipt') }}" class="form-control @error('receipt') is-invalid @enderror">
          @error('receipt')
          <div class="text-muted"></div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Create Receipt Information</button>
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