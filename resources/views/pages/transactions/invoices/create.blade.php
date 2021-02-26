@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Add Invoice</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('invoices.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="create_invoice_user_id" class="">Buyer</label>
          <select name="user_id" id="create_invoice_user_id" class="form-control form-control-sm w-auto">
            <option value="0" disabled selected>-- Select Buyer --</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="create_invoice_transaction_uuid" class="">Transaction</label>
          <select name="transaction_uuid" id="create_invoice_transaction_uuid" class="form-control form-control-sm w-auto">
            <option value="0" disabled selected>-- Select Transaction --</option>
          </select>
        </div>
        <div class="form-group">
          <label for="create_invoice_shipping_address_id" class="">Shipping Address</label>
          <select name="shipping_address_id" id="create_invoice_shipping_address_id" class="form-control form-control-sm w-auto">
            <option value="0" disabled selected>-- Select Shipping Address --</option>
            @foreach ($shipping_addresses as $shipping_address)
            <option value="{{ $shipping_address->id }}">{{ $shipping_address->user->name }} - {{ $shipping_address->name }} - {{ $shipping_address->address }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="sub_total" class="form-control-label">Sub Total</label>
          <input type="number" name="sub_total" value="{{ old('sub_total') }}" class="form-control @error('sub_total') is-invalid @enderror">
          @error('sub_total')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="courier" class="form-control-label">Courier</label>
          <input type="text" name="courier" value="{{ old('sub_total') }}" class="form-control @error('sub_total') is-invalid @enderror">
          @error('sub_total')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="shipping_cost" class="form-control-label">Shipping Cost</label>
          <input type="number" name="shipping_cost" value="{{ old('shipping_cost') }}" class="form-control @error('shipping_cost') is-invalid @enderror">
          @error('shipping_cost')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="coupon" class="form-control-label">Coupon</label>
          <select name="coupon_id" id="coupon" class="form-control form-control-sm w-auto">
            <option value="0" disabled selected>-- Select Coupon --</option>
            @foreach ($coupons as $coupon)
            <option value="{{ $coupon->id }}">{{ $coupon->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="transaction_total" class="form-control-label">Grand Total</label>
          <input type="number" name="transaction_total" value="{{ old('transaction_total') }}" class="form-control @error('transaction_total') is-invalid @enderror">
          @error('transaction_total')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="status" class="">Status</label>
          <select name="status" id="status" class="form-control form-control-sm w-auto">
            <option value="pending">Pending</option>
            <option value="success">Success</option>
            <option value="failed">Failed</option>
            <option value="paid">Paid</option>
          </select>
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Add Invoice</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('invoices') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection