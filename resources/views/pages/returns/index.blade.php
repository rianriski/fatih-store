@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block mb-1">Product Returns</h3>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('returns.search')}}" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert invoice ...">
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
                  <th>Invoice</th>
                  <th>Reason</th>
                  <th>Photo</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->uuid }}</td>
                  <td>{{ $product->reason }}</td>
                  <td>
                    @if( is_null($product->photo_1) )
                    <img src="{{ url('http://placehold.it/200x200') }}" alt="...">
                    @elseif( $product->photo_1 )
                    <img src="{{ url("storage/" . $product->photo_1) }}" alt="...">
                    @endif
                  </td>
                  <td>
                    @if ($product->status == 'pending') 
                      <span class="badge badge-warning">
                    @elseif($product->status == 'success')
                      <span class="badge badge-success">
                    @elseif($product->status == 'failed')
                      <span class="badge badge-danger">
                    @elseif($product->status == 'paid')
                      <span class="badge badge-primary">
                    @endif
                      {{$product->status}}
                    </span>
                  </td>
                  <td>
                    <a href="{{route('returns.show', $product->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                    <a href="{{route('returns.edit', $product->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
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
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection