@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Payment Detail</strong>
    </div>
    <div class="card-body card-block">
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5>Invoice ID</h5>
          <p>{{ $invoice->transaction_uuid }}</p>
          <hr>
          <h5>Buyer</h5>
          <p>{{ $user->name }}</p>
          <hr>

          @php
            $total = 0;
          @endphp

          @forelse ($transactions as $transaction)
          
            <p style="display: none">{{ $transaction->quantity }}</p>
            <p style="display: none">@currency($transaction->product->price)</p>
            <p style="display: none">@currency($transaction->quantity * $transaction->product->price)</p>

          @php
            $total += $transaction->quantity * $transaction->product->price;
          @endphp
          @empty

          @endforelse

          <h5>Total</h5>
          <p>@currency($total)</p>
          <hr>
          <h5>Phone</h5>
          <p>{{ $customer->phone }}</p>
          <hr>
          <h5>Payment Deadline</h5>
          <p>2020-08-10</p>
          <hr>
          <h5>Status</h5>
          <p>{{ ucfirst($invoice->status) }}</p>
        </div>
        <div class="col col-lg-6 col-md-8 col-sm-12">
          @if( $payment->payment_confirmation )
            <img src="{{url("storage/".$payment->payment_confirmation)}}" alt="" class="img-thumbnail img-fluid">
          @elseif( is_null($payment->payment_confirmation) )
            <img src="{{ url('http://placehold.it/400x400') }}" alt="..." class="img-thumbnail img-fluid">
          @endif
        </div>
      </div>
      <hr>
      <h4 class="mb-4">Change Status</h4>
        <div class="row mt-3">
          <div class="col col-lg-4 col-md-4 col-sm-4">
            <a href="{{route('payments.pending', $payment->id)}}" class="btn btn-warning btn-md btn-block" style="margin-top: -8px"><i class="fa fa-spinner mr-2"></i>Set Pending</a>
          </div>
          <div class="col col-lg-4 col-md-4 col-sm-4">
            <a href="{{route('payments.success', $payment->id)}}" class="btn btn-success btn-md btn-block" style="margin-top: -8px"><i class="fa fa-check mr-2"></i>Set Success</a>
          </div>
          <div class="col col-lg-4 col-md-4 col-sm-4">
            <a href="{{route('payments.failed', $payment->id)}}" class="btn btn-danger btn-md btn-block" style="margin-top: -8px"><i class="fa fa-times mr-2"></i>Set Failed</a>
          </div>
        </div>
        <hr>
      <div class="row">
        <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('payments') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
      </div>
    </div>
  </div>
@endsection