@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Invoice Detail</strong>
    </div>
    <div class="card-body card-block">
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <table class="table table-borderless">
            <thead>
            </thead>
            <tbody>
              <tr>
                <th scope="row">PO Numb</th>
                <td>{{ $invoice->transaction_uuid }}</td>
                <td hidden id="po_numb">{{ $invoice->id }}</td>
              </tr>
              <tr>
                <th scope="row">Customer</th>
                <td>{{ $user->name }}</td>
              </tr>
              <tr>
                <th scope="row">Date</th>
                <td>{{ Str::substr($invoice->created_at, 0, 10) }}</td>
              </tr>
              <tr>
                <th scope="row">Status</th>
                <td>
                  @if ($invoice->status == 'pending') 
                    <span class="badge badge-warning p-2">
                  @elseif($invoice->status == 'success')
                    <span class="badge badge-success p-2">
                  @elseif($invoice->status == 'failed')
                    <span class="badge badge-danger p-2">
                  @elseif($invoice->status == 'paid')
                    <span class="badge badge-primary p-2">
                  @endif
                    {{ucFirst($invoice->status)}}
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12">
          <table class="table table-borderless">
            <thead>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Receiver</th>
                <td>{{ $address->receiver }}</td>
              </tr>
              <tr>
                <th scope="row">Address</th>
                <td>{{ $address->address }}</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td>{{ $address->city }}, {{ $address->postal_code }}</td>
              </tr>
              <tr>
                <th scope="row">Phone</th>
                <td>{{ $address->phone }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <br>
      <div class="container">
        <div class="row">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Qty</th>
                <th scope="col">Weight</th>
                <th scope="col">Price</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @php
                $total = 0;
              @endphp

              @forelse ($transactions as $transaction)
              <tr>
                <td>{{ $transaction->product->name }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>@weight($transaction->product->weight) (gr)</td>
                <td>@currency($transaction->product->price)</td>
                <td>@currency($transaction->quantity * $transaction->product->price)</td>
              </tr>

              @php
                $total += $transaction->quantity * $transaction->product->price;
              @endphp

              @empty
              <tr>
                <td colspan="5" class="text-center p-5">Data not available</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <hr>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12">

          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12">
            <table class="table table-borderless">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Total</th>
                  <td>@currency($total)</td>
                </tr>
                <tr>
                  <th scope="row">Coupon</th>
                  <td>{{ $coupon->name }}</td>
                </tr>
                <tr>
                  <th scope="row">Discount</th>
                  <td>@if($coupon->discount == 0)
                      - 
                      @elseif($coupon->discount > 0)
                        {{ $coupon->discount }} %
                      @endif
                  </td>
                </tr>
                <tr>
                  <th scope="row">Shipping Cost</th>
                  <td>@currency($invoice->shipping_cost)</td>
                </tr>
                {{-- <hr> --}}
                <tr class="table-primary">
                  <th scope="row">Grand Total</th>
                  <td id="transaction_total">
                    @if($coupon->discount == 0)
                      @currency($total + $invoice->shipping_cost)
                    @elseif($coupon->discount > 0)
                      @currency(($coupon->discount / 100 * $total) + $invoice->shipping_cost)
                    @endif
                  </td>
                </tr>
                <form action="" method="post" id="hiddenForm">
                  @csrf
                  <input type="hidden" name="total" value="
                    @if($coupon->discount == 0)
                      {{$total + $invoice->shipping_cost}}
                    @elseif($coupon->discount > 0)
                      {{($coupon->discount / 100 * $total) + $invoice->shipping_cost}}
                    @endif">
                </form>
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-6">
            <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('invoices') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-6">
            <a class="btn btn-success text-white mt-3 ml-1 btn-block" href="{{route('invoices.edit', $invoice->id)}}"><i class="fa fa-pencil mr-2"></i>Edit</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
@endsection