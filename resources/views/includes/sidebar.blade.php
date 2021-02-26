<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-tachometer"></i>Dashboard</a>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-user"></i>Customers</a>
          <ul class="sub-menu children dropdown-menu">                            
            <li><i class="fa fa-file-text"></i><a href="{{ route('customers') }}">Profiles</a></li>
            <li><i class="fa fa-location-arrow"></i><a href="{{ route('shipping.addresses') }}">Shipping Addresses</a></li>
          </ul>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-suitcase"></i>Products</a>
          <ul class="sub-menu children dropdown-menu">                            
            <li><i class="fa fa-list-ol"></i><a href="{{ route('categories') }}">Categories</a></li>
            <li><i class="fa fa-list-ul"></i><a href="{{ route('products') }}">Product List</a></li>
            <li><i class="fa fa-mail-reply"></i><a href="{{ route('reviews') }}">Reviews</a></li>
          </ul>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-shopping-cart"></i>Transactions</a>
          <ul class="sub-menu children dropdown-menu">                            
            <li><i class="fa fa-print"></i><a href="{{route('invoices')}}">Invoices</a></li>
            <li><i class="fa fa-credit-card"></i><a href="{{route('payments')}}">Payments</a></li>
            <li><i class="fa fa-barcode"></i><a href="{{route('receipts')}}">Receipts</a></li>
            <li><i class="fa fa-ticket"></i><a href="{{ route('coupons') }}">Coupons</a></li>
            <li><i class="fa fa-list-ul"></i><a href="{{route('transactions')}}">Transaction List</a></li>
            <li><i class="fa fa-warning"></i><a href="{{route('returns')}}">Returns</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{route('messages')}}"><i class="menu-icon fa fa-comments"></i>Messages</a>
        </li>
        <li class="menu-item-has-children dropdown">
          <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-list-alt"></i>Blog</a>
          <ul class="sub-menu children dropdown-menu">                            
            <li><i class="fa fa-list-ol"></i><a href="{{route('post.categories')}}">Categories</a></li>
            <li><i class="fa fa-text-width"></i><a href="{{route('posts')}}">Posts</a></li>
            <li><i class="fa fa-comments-o"></i><a href="{{route('comments')}}">Comments</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{route('newsletters')}}"><i class="menu-icon fa fa-envelope"></i>Newsletters</a>
        </li>
        <li class="{{ (request()->segment(1) == 'hotel') ? 'active' : '' }}">
          <a href="{{route('hotels')}}"><i class="menu-icon fa fa-building-o"></i>Master Hotel</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside>
<!-- /#left-panel -->