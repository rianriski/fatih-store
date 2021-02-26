@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Product Detail</strong>
    </div>
    <div class="card-body card-block">
      <h5 class="mb-1">Name</h5>
      <p class="mb-3">{{ $product->name }}</p>
      <hr>
      <h5 class="mb-1">Category</h5>
      <p class="mb-3">{{ $product->category->category}}</p>
      <hr>
      <h5 class="mb-1">Description</h5>
      <p class="mb-3">{{ $product->description}}</p>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Stock</h5>
          <p class="mb-1">{{ $product->stock }}</p>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Price</h5>
          <p class="mb-1">@currency($product->price)</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Weight</h5>
          <p class="mb-1">@weight($product->weight) gram</p>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <h5 class="mb-1 mt-1">Expired</h5>
          <p class="mb-1">{{ $product->expired ? $product->expired : '-' }}</p>
        </div>
      </div>
      <hr>
      <h5 class="mb-1">Condition</h5>
      <p class="mb-3">{{ $product->condition }}</p>
      <hr>
      <h5 class="mb-3">Product Images</h5>
      <div class="row">
        <div class="col col-lg-3 col-md-6 col-sm-12">
          <img src="{{ url("storage/" . $product->photo->is_default) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
        </div>
        <div class="col col-lg-3 col-md-6 col-sm-12">
          <img src="{{ url("storage/" . $product->photo->photo_1) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
        </div>
        <div class="col col-lg-3 col-md-6 col-sm-12">
          <img src="{{ url("storage/" . $product->photo->photo_2) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
        </div>
        <div class="col col-lg-3 col-md-6 col-sm-12">
          <img src="{{ url("storage/" . $product->photo->photo_3) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('products') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-success text-white mt-3 ml-1 btn-block" href="{{ route('products.edit', $product->id) }}"><i class="fa fa-pencil mr-2"></i>Edit</a>
        </div>
      </div>
    </div>
  </div>
@endsection