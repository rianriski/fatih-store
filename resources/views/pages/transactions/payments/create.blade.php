@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Create Payment</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('payments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="invoice_id" class="form-control-label">Transaction</label>
          <select name="invoice_id" id="invoice_id" class="form-control form-control-sm w-auto">
            <option value="0" disabled selected>-- Select Transaction --</option>
            @foreach ($invoices as $invoice)
            <option value="{{ $invoice->id }}">{{ $invoice->transaction_uuid }} - {{ $invoice->user->name }}</option>
            @endforeach
          </select>
        </div>
        <hr>
        <div class="form-group">
          <label for="payment_confirmation" class="form-control-label">Upload Payment Confirmation</label>
          <input type="file" name="payment_confirmation" class="form-control-file" accept="image/*" id="payment_confirmation" @error('payment_confirmation') is-invalid @enderror">
          @error('payment_confirmation')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        <div class="form-group">
          <label for="status" class="form-control-label">Status</label>
          <select name="status" id="status" class="form-control form-control-sm w-auto">
            <option value="0" disabled selected>-- Select Payment Status --</option>
            <option value="Pending">Pending</option>
            <option value="Approved">Approved</option>
            <option value="Reject">Reject</option>
          </select>
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Create Payment</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('payments') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection