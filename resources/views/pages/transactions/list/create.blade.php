@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Add Transaction</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('transactions.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="product_id" class="">Product</label>
          <select name="product_id" id="product_id" class="form-control form-control-sm w-auto">
            @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="user_id" class="">Buyer</label>
          <select name="user_id" id="user_id" class="form-control form-control-sm w-auto">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="quantity" class="form-control-label">Quantity</label>
          <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror">
          @error('quantity')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Add Transaction</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('transactions') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection