@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Add Product</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Product Name</label>
          <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control @error('name') is-invalid @enderror">
          {{-- jika error tampilkan message --}}
          @error('name')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category_id" class="">Category</label>
          <select name="category_id" id="category_id" class="form-control form-control-sm w-auto">
            @foreach ($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->category }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="description" class="form-control-label">Description</label>
          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
          @error('description')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="stock" class="form-control-label">Stock</label>
              <input type="number" name="stock" value="{{ old('stock') }}" class="form-control @error('stock') is-invalid @enderror">
              @error('stock')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="price" class="form-control-label">Price</label>
              <input type="number" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror">
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
              <input type="number" name="weight" value="{{ old('weight') }}" class="form-control @error('weight') is-invalid @enderror">
              @error('weight')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="expired" class="form-control-label">Expired Date (Optional)</label>
              <input type="date" name="expired" value="{{ old('expired') }}" class="form-control @error('expired') is-invalid @enderror">
              @error('expired')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="condition" class="form-control-label">Condition</label>
          <select name="condition" id="condition" class="form-control form-control-sm w-auto">
            <option value="New">New</option>
            <option value="Second">Second</option>
          </select>
        </div>
        <hr>
        <h5>Add Images</h5>
        <p class="blockquote-footer">Max image size 1 mega byte</p>
        <div class="form-group border border-info p-3 rounded">
          <label for="is_default">Main Photo</label>
          <input type="file" name="is_default" class="form-control-file" accept="image/*" id="is_default" @error('is_default') is-invalid @enderror">
          @error('is_default')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-4 col-md-4 col-sm-12 border-right border-dark pl-4">
            <div class="form-group">
              <label for="photo_1">Secondary Photo</label>
              <input type="file" name="photo_1" class="form-control-file" accept="image/*" id="photo_1" @error('photo_1') is-invalid @enderror">
              @error('photo_1')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-4 col-md-4 col-sm-12 border-right border-dark">
            <div class="form-group">
              <label for="photo_2">Third Photo</label>
              <input type="file" name="photo_2" class="form-control-file" accept="image/*" id="photo_2" @error('photo_2') is-invalid @enderror">
              @error('photo_2')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-4 col-md-4 col-sm-12 border-dark">
            <div class="form-group">
              <label for="photo_3">Fourth Photo</label>
              <input type="file" name="photo_3" class="form-control-file" accept="image/*" id="photo_3" @error('photo_3') is-invalid @enderror">
              @error('photo_3')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Add Product</button>
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