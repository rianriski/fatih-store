@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Review Product</strong>
    </div>
    <div class="card-body card-block">
      @if( is_null($review->photo) )
        <img src="{{ url('http://placehold.it/200x200') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
      @elseif( $review->photo )
        <img src="{{ url("storage/" . $review->photo) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
      @endif
      
      <form action="{{route('user.reviews.update', $review->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="product" class="form-control-label">Product</label>
          <input type="text" name="product" value="{{ $review->product->name }}" id="product" class="form-control @error('product') is-invalid @enderror" readonly>
          @error('email')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="score" class="form-control-label">Rating</label>
          <select name="score" id="score" class="form-control form-control-sm w-auto">
            <option value="5">5/5 - Excellent</option>
            <option value="4">4/5 - Good</option>
            <option value="3">3/5 - Enough</option>
            <option value="2">2/5 - Need Improvement</option>
            <option value="1">1/5 - Bad</option>
          </select>
        </div>
        <div class="form-group">
          <label for="review" class="form-control-label">Review</label>
          <textarea name="review" id="review" class="form-control @error('review') is-invalid @enderror">{{ old('review') ? old('review') : $review->review }}</textarea>
          @error('review')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Change Photo</label>
          <input type="file" name="photo" class="form-control-file" accept="image/*" id="photo" @error('photo') is-invalid @enderror">
          @error('photo')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('reviews') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection