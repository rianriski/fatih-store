@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Address Detail</strong>
    </div>
    <div class="card-body card-block">
      <h5 class="mb-1">Address Title</h5>
      <p class="mb-3">{{ $address->name }}</p>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Customer</h5>
          <p class="mb-1">{{ $address->user->name }}</p>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Receiver</h5>
          <p class="mb-1">{{ $address->receiver }}</p>
        </div>
      </div>
      <hr>
      <h5 class="mb-1">Address</h5>
      <p class="mb-3">{{ $address->address}}</p>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">City</h5>
          <p class="mb-1">{{ $address->city }}</p>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Postal Code</h5>
          <p class="mb-1">{{ $address->postal_code }}</p>
        </div>
      </div>
      <hr>
      <h5 class="mb-1 mt-1">Phone</h5>
      <p class="mb-1">{{ $address->phone }}</p>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('user.shipping.addresses') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-success text-white mt-3 ml-1 btn-block" href="{{route('user.shipping.addresses.edit', $address->id)}}"><i class="fa fa-pencil mr-2"></i>Edit</a>
        </div>
      </div>
    </div>
  </div>
@endsection