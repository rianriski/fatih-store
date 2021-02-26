@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Payments</h3>
              <a href="{{route('payments.create')}}" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Add Payment</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert transaction code ...">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body--">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Transaction UUID</th>
                  <th>Payment</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($payments as $payment)
                <tr>
                  <td>{{ $payment->id }}</td>
                  <td>{{ Str::substr($payment->created_at, 0, 10) }}</td>
                  <td>{{ $payment->invoice->transaction_uuid }}</td>
                  <td>
                    <img src="{{url("storage/".$payment->payment_confirmation)}}" alt="">
                  </td>
                  <td>
                    @if ($payment->status == 'Pending') 
                      <span class="badge badge-warning">
                    @elseif($payment->status == 'Success')
                      <span class="badge badge-success">
                    @elseif($payment->status == 'Failed')
                      <span class="badge badge-danger">
                    @endif
                      {{$payment->status}}
                    </span>
                  </td>
                  <td>
                    <a href="{{route('payments.show', $payment->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                    <a href="{{route('payments.edit', $payment->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('payments.destroy', $payment->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              
                @empty
                <tr>
                  <td colspan="6" class="text-center p-5">Data not available</td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="container">
            {{ $payments->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection