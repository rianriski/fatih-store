@extends('layouts.default')

@section ('content')
  <div class="orders">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col col-lg-8 col-md-8 col-sm-12">
                <h3 class="">List Customers</h3>
              </div>
              <div class="col col-lg-4 col-md-4 col-sm-12">
                <div class="right-align">
                  <form action="{{ route('customers.search') }}" method="GET">
                    <div class="input-group">
                      <input type="search" name="search" class="form-control" placeholder="Insert User Name ...">
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @forelse ($customers as $customer)
                  <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->customer->address }}</td>
                    <td>{{ $customer->customer->phone }}</td>
                    <td>
                      <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                      <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                      <form action="{{ route('customers.destroy', $customer->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
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
          </div>
          
          <div class="container">
            {{ $customers->links() }}
          </div>
        </div>
      </div>
    </div>  
  </div>
@endsection