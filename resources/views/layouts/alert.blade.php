@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@elseif (session('info'))
  <div class="alert alert-info">
    {{ session('info') }}
  </div>
@elseif (session('danger'))
  <div class="alert alert-danger">
    {{ session('danger') }}
  </div>
@endif