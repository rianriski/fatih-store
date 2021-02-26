@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Shipping Addresses</h3>
              <a href="{{ route('shipping.addresses.create') }}" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Add Address</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{ route('shipping.addresses.search') }}" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert address ...">
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
                  <th>Title</th>
                  <th>Buyer</th>
                  <th>Shipping Address</th>
                  <th>City</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($addresses as $address)
                <tr>
                  <td>{{ $address->id }}</td>
                  <td>{{ $address->name }}</td>
                  <td>{{ $address->user->name }}</td>
                  <td>{{ $address->address }}</td>
                  <td>{{ $address->city }}</td>
                  <td>
                    <a href="{{ route('shipping.addresses.show', $address->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                    <a href="{{ route('shipping.addresses.edit', $address->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{ route('shipping.addresses.destroy', $address->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
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
            {{ $addresses->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection