@extends('layouts.user_default')

@section ('content')

<div class="col-sm-12 mb-2">
  <div class="card-group">
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-shopping-cart"></i>
              </div>

              <div class="h4 mb-0">
                  <span class="">@number($countOrder)</span>
              </div>

              <small class="text-muted text-uppercase font-weight-bold">Orders</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-mail-reply"></i>
              </div>
              <div class="h4 mb-0">
                  <span class="">@number($reviews)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Reviews</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-warning"></i>
              </div>
              <div class="h4 mb-0">
                  <span class="">@number($returns)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Returns</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-comments"></i>
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
                  <i class="fa fa-comment"></i>
              </div>
              <div class="h4 mb-0">
                <span class="">@number($comments)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Comments</small>
              <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
          </div>
      </div>
      <div class="card col-md-6 no-padding ">
          <div class="card-body">
              <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-location-arrow"></i>
              </div>
              <div class="h4 mb-0">
                  <span class="">@number($addresses)</span>
              </div>
              <small class="text-muted text-uppercase font-weight-bold">Addresses</small>
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

          <div class="col-lg-3 col-md-6">
              <div class="card">
                  <div class="card-body">
                      <div class="stat-widget-five">
                          <div class="stat-icon dib flat-color-1">
                              <i class="pe-7s-check"></i>
                          </div>
                          <div class="stat-content">
                              <div class="text-left dib">
                                  <div class="stat-text"><span class="">@number(1)</span></div>
                                  <div class="stat-heading">Transactions Success</div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer bg-secondary">
                    <a href="{{route('orders.success')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib text-warning">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="">@number(1)</span></div>
                                <div class="stat-heading">Waiting For Payment</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-secondary">
                  <a href="{{route('orders.pending')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="card">
              <div class="card-body">
                  <div class="stat-widget-five">
                      <div class="stat-icon dib flat-color-3">
                          <i class="pe-7s-paper-plane"></i>
                      </div>
                      <div class="stat-content">
                          <div class="text-left dib">
                              <div class="stat-text"><span class="">@number(1)</span></div>
                              <div class="stat-heading">Waiting For Receipt</div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer bg-secondary">
                <a href="{{route('orders.receipt')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
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
                              <div class="stat-text"><span class="">@number(1)</span></div>
                              <div class="stat-heading">Transactions Failed</div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="card-footer bg-secondary">
                <a href="{{route('orders.failed')}}" class="d-block text-light">See Detail<i class="fa fa-angle-double-right ml-2"></i></a>
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
              <h3 class="mr-4 d-inline-block">Ongoing Orders</h3>
            </div>
          </div>
  
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>UUID</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @forelse ($orders as $order)
                  <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->transaction_uuid }}</td>
                    <td>
                      @if ($order->status == 'pending') 
                        <span class="badge badge-warning">
                      @elseif($order->status == 'success')
                        <span class="badge badge-success">
                      @endif
                        {{$order->status}}
                      </span>
                    <td>
                      <a href="{{route('orders.show', $order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>                      
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
  
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
  
          <div class="card-body">
            <div class="row">
              <div class="col col-lg-8 col-md-8 col-sm-12">
                <h3 class="mr-4 d-inline-block">Wishlist Products</h3>
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
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @forelse ($wishlists as $wishlist)
                  <tr>
                    <td>{{ $wishlist->id }}</td>
                    <td>{{ $wishlist->product_name }}</td>
                    <td>{{ $wishlist->product->price }}</td>
                    <td>
                      <a href="{{route('user.wishlist.show', $wishlist->product_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
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

          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
@endsection