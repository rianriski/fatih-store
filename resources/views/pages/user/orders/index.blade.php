@extends('layouts.user_default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Order List</h3>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('orders.search')}}" method="GET">
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
                  <th>UUID</th>
                  <th>Courier</th>
                  <th>Address</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($orders as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->transaction_uuid }}</td>
                  <td>{{ $order->courier }}</td>
                  <td>{{ $order->shippingAddress->address }}</td>
                  <td>{{ $order->transaction_total }}</td>
                  <td>
                    @if ($order->status == 'pending') 
                      <span class="badge badge-warning">
                    @elseif($order->status == 'success')
                      <span class="badge badge-success">
                    @elseif($order->status == 'failed')
                      <span class="badge badge-danger">
                    @elseif($order->status == 'paid')
                      <span class="badge badge-primary">
                    @endif
                      {{$order->status}}
                    </span>
                  </td>
                  <td>
                    <a href="{{route('orders.show', $order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                  </td>
                </tr>
              
                @empty
                <tr>
                  <td colspan="7" class="text-center p-5">Data not available</td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="container">
            {{ $orders->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection