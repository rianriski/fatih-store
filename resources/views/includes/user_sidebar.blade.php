<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ (request()->segment(1) == 'home') ? 'active' : '' }}">
          <a href="{{route('home')}}"><i class="menu-icon fa fa-tachometer"></i>Dashboard</a>
        </li>
        <li class="{{ (request()->segment(2) == 'orders') ? 'active' : '' }}">
          <a href="{{route('orders')}}"><i class="menu-icon fa fa-shopping-cart"></i>Orders</a>
        </li>
        <li class="{{ (request()->segment(2) == 'wishlist') ? 'active' : '' }}">
          <a href="{{route('user.wishlist')}}"><i class="menu-icon fa fa-heart"></i>Wishlist</a>
        </li>
        <li class="{{ (request()->segment(2) == 'reviews') ? 'active' : '' }}">
          <a href="{{route('user.reviews')}}"><i class="menu-icon fa fa-mail-reply"></i>Reviews</a>
        </li>
        <li class="{{ (request()->segment(2) == 'returns') ? 'active' : '' }}">
          <a href="{{route('user.returns')}}"><i class="menu-icon fa fa-warning"></i>Returns</a>
        </li>
        <li class="{{ (request()->segment(2) == 'messages') ? 'active' : '' }}">
          <a href="{{route('user.messages')}}"><i class="menu-icon fa fa-comments"></i>Messages</a>
        </li>
        <li class="{{ (request()->segment(2) == 'comments') ? 'active' : '' }}">
          <a href="{{route('user.comments')}}"><i class="menu-icon fa fa-comment"></i>Blog Comments</a>
        </li>
        <li class="{{ (request()->segment(2) == 'newsletters') ? 'active' : '' }}">
          <a href="{{route('user.newsletters')}}"><i class="menu-icon fa fa-envelope"></i>Newsletters</a>
        </li>
        <li class="{{ (request()->segment(2) == 'addresses') ? 'active' : '' }}">
          <a href="{{route('user.shipping.addresses')}}"><i class="menu-icon fa fa-location-arrow"></i>Shipping Addresses</a>
        </li>
        <li class="{{ (request()->segment(2) == 'profile') ? 'active' : '' }}">
          <a href="{{route('user.profile')}}"><i class="menu-icon fa fa-user"></i>Profile</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</aside>
<!-- /#left-panel -->