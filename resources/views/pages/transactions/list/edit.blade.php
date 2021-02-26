@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Transaction</strong>
    </div>
    <div class="card-body card-block">
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="product_id" class="">Product</label>
          <select name="product_id" id="product_id" class="form-control form-control-sm w-auto">
            @foreach ($products as $product)
            <option 
            value="{{ $product->id }}" 
            @if($product->id === $transaction->product_id) selected @endif
            >{{ $product->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="user_id" class="">Buyer</label>
          <select name="user_id" id="user_id" class="form-control form-control-sm w-auto">
            @foreach ($users as $user)
            <option 
            value="{{ $user->id }}" 
            @if($user->id === $transaction->user_id) selected @endif
            >{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="quantity" class="form-control-label">Quantity</label>
          <input type="text" name="quantity" value="{{ $transaction->quantity }}" id="quantity" class="form-control @error('quantity') is-invalid @enderror">
          {{-- jika error tampilkan message --}}
          @error('quantity')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group">
          <div class="row mt-4">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update Transaction</button>
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