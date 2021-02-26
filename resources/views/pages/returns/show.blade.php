@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Refund Request Detail</strong>
    </div>
    <div class="card-body card-block">
      <h5 class="mb-3">Invoice</h5>
      <a href="{{route('orders.show', $data->invoice_id)}}" class="btn btn-info btn-sm" style="margin-top: -8px">{{ $data->uuid }}</a>
      <hr>
      <h5 class="mb-1">Reason</h5>
      <p class="mb-3">{{ $data->reason }}</p>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Courier</h5>
          <p class="mb-1">{{ $data->courier }}</p>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Receipt</h5>
          <p class="mb-1">{{ $data->receipt }}</p>
        </div>
      </div>
      <hr>
      <h5 class="mb-1">Status</h5>
      <p class="mb-3">{{ ucFirst($data->status) }}</p>
      <hr>
      <h5 class="mb-1">Payback</h5>
      @if( is_null($data->payback) )
        <p>Data not available</p>
      @elseif( $data->payback )
        <img src="{{ url("storage/" . $data->payback) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
      @endif
      <hr>
      <h5 class="mb-3">Supporting Images</h5>
      <div class="row">
        <div class="col col-lg-4 col-md-4 col-sm-12">
          @if( is_null($data->photo_1) )
            <img src="{{ url('http://placehold.it/200x200') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @elseif( $data->photo_1 )
            <img src="{{ url("storage/" . $data->photo_1) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @endif
        </div>
        <div class="col col-lg-4 col-md-4 col-sm-12">
          @if( is_null($data->photo_2) )
            <img src="{{ url('http://placehold.it/200x200') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @elseif( $data->photo_2 )
            <img src="{{ url("storage/" . $data->photo_2) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @endif
        </div>
        <div class="col col-lg-4 col-md-4 col-sm-12">
          @if( is_null($data->photo_3) )
            <img src="{{ url('http://placehold.it/200x200') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @elseif( $data->photo_3 )
            <img src="{{ url("storage/" . $data->photo_3) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @endif
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('returns') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-success text-white mt-3 ml-1 btn-block" href=""><i class="fa fa-pencil mr-2"></i>Edit</a>
        </div>
      </div>
    </div>
  </div>
@endsection