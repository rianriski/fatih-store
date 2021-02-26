@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Product</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Product Name</label>
          <input type="text" name="name" value="{{ $product->name }}" id="name" class="form-control @error('name') is-invalid @enderror">
          {{-- jika error tampilkan message --}}
          @error('name')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category_id" class="">Category</label>
          <select name="category_id" id="category_id" class="form-control form-control-sm w-auto">
            @foreach ($categories as $cat)
            <option 
              value="{{ $cat->id }}" 
              @if($cat->id === $product->category_id) selected @endif
              >{{ $cat->category }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="description" class="form-control-label">Description</label>
          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
          @error('description')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="stock" class="form-control-label">Stock</label>
              <input type="number" name="stock" value="{{ $product->stock }}" class="form-control @error('stock') is-invalid @enderror">
              @error('stock')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="price" class="form-control-label">Price</label>
              <input type="number" name="price" value="{{ $product->price }}" class="form-control @error('price') is-invalid @enderror">
              @error('price')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="weight" class="form-control-label">Weight (gram)</label>
              <input type="number" name="weight" value="{{ $product->weight }}" class="form-control @error('weight') is-invalid @enderror">
              @error('weight')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="expired" class="form-control-label">Expired Date (Optional)</label>
              <input type="date" name="expired" value="{{ $product->expired }}" class="form-control @error('expired') is-invalid @enderror">
              @error('expired')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="condition" class="form-control-label">Condition</label>
          <select name="condition" id="condition" class="form-control form-control-sm w-auto">
            <option @if($product->condition === "New") selected @endif>New</option>
            <option @if($product->condition === "Second") selected @endif>Second</option>
          </select>
        </div>
        <hr>
        <h5 class="mb-1">Product Images</h5>
        <p class="blockquote-footer mb-3">Max image size 1 mega byte</p>
        <div class="row">
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <label for="is_default" style="cursor: pointer">
              <img src="{{ url("storage/" . $product->photo->is_default) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
            </label>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <label for="photo_1" style="cursor: pointer">
              <img src="{{ url("storage/" . $product->photo->photo_1) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
            </label>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <label for="photo_2" style="cursor: pointer">
              <img src="{{ url("storage/" . $product->photo->photo_2) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
            </label>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <label for="photo_3" style="cursor: pointer">
              <img src="{{ url("storage/" . $product->photo->photo_3) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <div class="form-group ml-1">
              {{-- <label for="is_default">Main Photo</label> --}}
              <input type="file"  name="is_default" class="form-control-file" accept="image/*" id="is_default" @error('is_default') is-invalid @enderror">
              @error('is_default')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <div class="form-group ml-1">
              {{-- <label for="photo_2">Secondary Photo</label> --}}
              <input type="file" name="photo_1" class="form-control-file" accept="image/*" id="photo_1" @error('photo_1') is-invalid @enderror">
              @error('photo_1')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <div class="form-group ml-1">
              {{-- <label for="photo_3">Third Photo</label> --}}
              <input type="file" name="photo_2" class="form-control-file" accept="image/*" id="photo_2" @error('photo_2') is-invalid @enderror">
              @error('photo_2')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-3 col-md-6 col-sm-12">
            <div class="form-group ml-1">
              {{-- <label for="photo_4">Fourth Photo</label> --}}
              <input type="file" name="photo_3" class="form-control-file" accept="image/*" id="photo_3" @error('photo_3') is-invalid @enderror">
              @error('photo_3')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row mt-4">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update Product</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('products') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection