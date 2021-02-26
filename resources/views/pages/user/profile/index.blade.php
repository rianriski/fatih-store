@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Profile</strong>
    </div>
    <div class="card-body card-block">
      <div class="row">
        <div class="col col-lg-4 col-md-5 col-sm-12">
          @if( is_null($customer->photo) )
            <img src="{{ url('http://placehold.it/200x200') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @elseif( $customer->photo )
            <img src="{{ url("storage/" . $customer->photo) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @endif
        </div>
        <div class="col col-lg-8 col-md-7 col-sm-12">
          <h5 class="mb-1">Name</h5>
          <p class="mb-3">{{ $user->name }}</p>
          <hr>
          <h5 class="mb-1">Email</h5>
          <p class="mb-3">{{ $user->email}}</p>
          <hr>
          <h5 class="mb-1">Phone</h5>
          <p class="mb-3">{{ $customer->phone}}</p>
          <hr>
        </div>
      </div>
      <h5 class="mb-1 mt-3">Address</h5>
      <p class="mb-3">{{ $customer->address }}</p>
      <hr>
      <h5 class="mb-1">Birth</h5>
      <p class="mb-3">{{ $customer->birth }}</p>
      <hr>
      <h5 class="mb-1">Gender</h5>
      <p class="mb-3">{{ $customer->gender }}</p>
      <hr>
      <div class="row mt-1">
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-success text-white mt-3 ml-1 btn-block" href="{{route('user.profile.edit')}}"><i class="fa fa-pencil mr-2"></i>Edit</a>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-primary text-white mt-3 btn-block" href="{{route('user.change.password')}}"><i class="fa fa-reply mr-2"></i>Change Password</a>
        </div>
      </div>
    </div>
  </div>
@endsection