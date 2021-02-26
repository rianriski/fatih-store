@extends('layouts.user_default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4">Reviews</h3>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('user.reviews.search')}}" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert review or rating ...">
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
                  <th>Date</th>
                  <th>Product</th>
                  <th>Rating</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($reviews as $review)
                <tr>
                  <td>{{ $review->id }}</td>
                  <td>{{ Str::substr($review->created_at, 0, 10) }}</td>
                  <td>{{ $review->product->name }}</td>
                  <td>{{ $review->score }} / 5</td>
                  <td>
                    @if( is_null($review->photo) )
                      <img src="{{ url('http://placehold.it/200x200') }}" alt="...">
                    @elseif( $review->photo )
                      <img src="{{ url("storage/" . $review->photo) }}" alt="...">
                    @endif
                  </td>
                  <td>
                    <a href="{{route('user.reviews.show', $review->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
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
            {{ $reviews->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection