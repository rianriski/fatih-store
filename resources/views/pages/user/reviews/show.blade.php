@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Review Detail</strong>
    </div>
    <div class="card-body card-block">
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          @if( is_null($review->photo) )
            <img src="{{ url('http://placehold.it/350x350') }}" alt="..." class="img-thumbnail img-fluid mb-3">
          @elseif( $review->photo )
            <img src="{{ url("storage/" . $review->photo) }}" alt="..." class="img-thumbnail img-fluid mb-3">
          @endif
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1">Date</h5>
          <p class="mb-3">{{ Str::substr($review->created_at, 0, 10) }}</p>
          <hr>
          <h5 class="mb-1">Product</h5>
          <p class="mb-3">{{ $review->product->name }}</p>
          <hr>
          <h5 class="mb-1 mt-3">Rating</h5>
          <p class="mb-3">{{ $review->score }} / 5</p>
          <hr>
          <h5 class="mb-1">Review</h5>
          <p class="mb-3">{{ $review->review }}</p>
        </div>
      </div>
      <hr>
      <div class="row mt-1">
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('reviews') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-success text-white mt-3 ml-1 btn-block" href="{{route('user.reviews.edit', $review->id)}}"><i class="fa fa-pencil mr-2"></i>Edit</a>
        </div>
      </div>
    </div>
  </div>
@endsection