@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row container">
            <h3 class="mr-4">Coupons</h3>
            <a href="{{route('coupons.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Add Coupon</a>
          </div>
        </div>

        <div class="card-body--">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Coupon Name</th>
                  <th>Discount</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($coupons as $coupon)
                <tr>
                  <td>{{ $coupon->id }}</td>
                  <td>{{ $coupon->name }}</td>
                  <td>{{ $coupon->discount }} %</td>
                  <td>{{ $coupon->description }}</td>
                  <td>
                    <a href="{{route('coupons.edit', $coupon->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('coupons.destroy', $coupon->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              
                @empty
                <tr>
                  <td colspan="5" class="text-center p-5">Data not available</td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="container">
            {{ $coupons->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection