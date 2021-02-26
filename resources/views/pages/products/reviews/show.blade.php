@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Review Detail</strong>
    </div>
    <div class="card-body card-block">
      <div class="row">
        <div class="col col-lg-4 col-md-5 col-sm-12">
          @if( is_null($review->photo) )
            <img src="{{ url('http://placehold.it/200x200') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @elseif( $review->photo )
            <img src="{{ url("storage/" . $review->photo) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
          @endif
        </div>
        <div class="col col-lg-8 col-md-7 col-sm-12">
          <h5 class="mb-1">Date</h5>
          <p class="mb-3">{{ Str::substr($review->created_at, 0, 10) }}</p>
          <hr>
          <h5 class="mb-1">Product</h5>
          <p class="mb-3">{{ $review->product->name }}</p>
          <hr>
          <h5 class="mb-1">Reviewer</h5>
          <p class="mb-3">{{ $review->user->name}}</p>
          <hr>
        </div>
      </div>
      <h5 class="mb-1 mt-3">Rating</h5>
      <p class="mb-3">{{ $review->score }} / 5</p>
      <hr>
      <h5 class="mb-1">Review</h5>
      <p class="mb-3">{{ $review->review }}</p>
      <hr>
      <div class="row mt-1">
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('reviews') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-success text-white mt-3 ml-1 btn-block" href="{{route('reviews.edit', $review->id)}}"><i class="fa fa-pencil mr-2"></i>Edit</a>
        </div>
      </div>
    </div>
  </div>
@endsection