@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Transaction List</h3>
              <a href="{{route('transactions.create')}}" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Add Transaction</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('transactions.search')}}" method="GET">
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
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->id }}</td>
                  <td>{{ $transaction->uuid }}</td>
                  <td>{{ $transaction->product->name }}</td>
                  <td>{{ $transaction->quantity }}</td>
                  <td>@currency($transaction->transaction_total)</td>
                  <td>
                    <a href="{{route('transactions.edit', $transaction->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('transactions.destroy', $transaction->uuid)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      {{-- @method('delete') --}}
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
            {{ $transactions->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection