@extends('layouts.user_default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Wishlist</h3>
              <a href="" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Add Wishlist</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert product name ...">
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
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Weight</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($wishlist as $wish)
                <tr>
                  <td>{{ $wish->id }}</td>
                  <td>{{ $wish->product_name }}</td>
                  <td>{{ $wish->product->stock }}</td>
                  <td>{{ $wish->product->price }}</td>
                  <td>{{ $wish->product->weight }}</td>
                  <td>
                    <a href="{{route('user.wishlist.show', $wish->product_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                    <form action="{{route('user.wishlist.destroy', $wish->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      {{-- @method('delete') --}}
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
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
            {{ $wishlist->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection