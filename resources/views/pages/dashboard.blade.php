@extends('layouts.default')

@section ('content')
<div class="col-sm-12 mb-2">
  <div class="card-group">
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-users"></i>
              </div>

              <div class="h4 mb-0">
                  <span class="">@number($customers)</span>
              </div>

              <small class="text-muted text-uppercase font-weight-bold">Customers</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-suitcase"></i>
              </div>
              <div class="h4 mb-0">
                  <span class="">@number($products)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Products</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-cart-plus"></i>
              </div>
              <div class="h4 mb-0">
                  <span class="">@number($invoices)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Transactions</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-comments-o"></i>
              </div>
              <div class="h4 mb-0">
                <span class="">@number($messages)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Messages</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-list-alt"></i>
              </div>
              <div class="h4 mb-0">
                <span class="">@number($posts)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Posts</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-envelope"></i>
              </div>
              <div class="h4 mb-0">
                  <span class="">@number($newsletters)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Newsletters</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
  </div>
</div>


<div class="content">
  <!-- Animated -->
  <div class="animated fadeIn">
      <!-- Widgets  -->
      <div class="row">
          <div class="col-lg-6 col-md-12">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib flat-color-3">
                              <i class="pe-7s-cash"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span class="">@currency($revenue)</span></div>
                                  <div class="stat-heading">Revenue</div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-secondary">
                    <a href="{{route('dashboard.revenue')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-6">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib flat-color-1">
                              <i class="pe-7s-check"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span class="">@number($success)</span></div>
                                  <div class="stat-heading">Success</div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-secondary">
                    <a href="{{route('dashboard.success')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-6">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib text-warning">
                              <i class="pe-7s-stopwatch"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span class="">@number($pending)</span></div>
                                  <div class="stat-heading">Pending</div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-secondary">
                    <a href="{{route('dashboard.pending')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="">@number($payments)</span></div>
                                <div class="stat-heading">Waiting For Payment</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary">
                  <a href="{{route('dashboard.payment')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-paper-plane"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="">@number($receipts)</span></div>
                                <div class="stat-heading">Waiting For Receipt</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary">
                  <a href="{{route('dashboard.receipt')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib text-warning">
                            <i class="pe-7s-chat"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="">@number($complained)</span></div>
                                <div class="stat-heading">Complained Transactions</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary">
                  <a href="{{route('dashboard.complained')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib text-danger">
                            <i class="pe-7s-attention"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="">@number($failed)</span></div>
                                <div class="stat-heading">Failed Transactions</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary">
                  <a href="{{route('dashboard.failed')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div class="content">
  <hr style="margin-top:-50px;">
  <div class="orders">
    <div class="row">
      <div class="col-6">
        <div class="card">
  
          <div class="card-body">
            <div class="row col">
              <h3 class="mr-4 d-inline-block">Bestseller Product</h3>
            </div>
          </div>
  
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Sold</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  {{-- @forelse ($payments as $payment) --}}
                  <tr>
                    {{-- <td>{{ $payment->id }}</td>
                    <td>{{ Str::substr($payment->created_at, 0, 10) }}</td>
                    <td>{{ $payment->invoice->transaction_uuid }}</td> --}}
                    <td>
                      {{-- <img src="{{url("storage/".$payment->payment_confirmation)}}" alt=""> --}}
                    </td>
                    <td>
                      {{-- @if ($payment->status == 'Pending') 
                        <span class="badge badge-warning">
                      @elseif($payment->status == 'Success')
                        <span class="badge badge-success">
                      @elseif($payment->status == 'Failed')
                        <span class="badge badge-danger">
                      @endif
                        {{$payment->status}}
                      </span> --}}
                    </td>
                    <td>
                      {{-- <a href="{{route('payments.show', $payment->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                      <a href="{{route('payments.edit', $payment->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                      <form action="{{route('payments.destroy', $payment->id)}}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </form> --}}
                    </td>
                  </tr>
                
                  {{-- @empty --}}
                  <tr>
                    <td colspan="6" class="text-center p-5">Data not available</td>
                  </tr>
                  {{-- @endforelse --}}
                  
                </tbody>
              </table>
            </div>
  
            {{-- <div class="container">
              {{ $payments->links() }}
            </div> --}}
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
  
          <div class="card-body">
            <div class="row">
              <div class="col col-lg-8 col-md-8 col-sm-12">
                <h3 class="mr-4 d-inline-block">Best Customer</h3>
              </div>
              <div class="col col-lg-4 col-md-4 col-sm-12">
                
              </div>
            </div>
          </div>
  
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Transaction</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  {{-- @forelse ($payments as $payment) --}}
                  <tr>
                    {{-- <td>{{ $payment->id }}</td>
                    <td>{{ Str::substr($payment->created_at, 0, 10) }}</td>
                    <td>{{ $payment->invoice->transaction_uuid }}</td> --}}
                    <td>
                      {{-- <img src="{{url("storage/".$payment->payment_confirmation)}}" alt=""> --}}
                    </td>
                    <td>
                      {{-- @if ($payment->status == 'Pending') 
                        <span class="badge badge-warning">
                      @elseif($payment->status == 'Success')
                        <span class="badge badge-success">
                      @elseif($payment->status == 'Failed')
                        <span class="badge badge-danger">
                      @endif
                        {{$payment->status}}
                      </span> --}}
                    </td>
                    <td>
                      {{-- <a href="{{route('payments.show', $payment->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                      <a href="{{route('payments.edit', $payment->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                      <form action="{{route('payments.destroy', $payment->id)}}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </form> --}}
                    </td>
                  </tr>
                
                  {{-- @empty --}}
                  <tr>
                    <td colspan="6" class="text-center p-5">Data not available</td>
                  </tr>
                  {{-- @endforelse --}}
                  
                </tbody>
              </table>
            </div>
  
            {{-- <div class="container">
              {{ $payments->links() }}
            </div> --}}
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
@endsection