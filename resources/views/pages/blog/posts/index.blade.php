@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Posts</h3>
              <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Create</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('posts.search')}}" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert title or status ...">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body--">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Thumbnail</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($posts as $post)
                <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->category->category }}</td>
                  <td>{{ $post->title }}</td>
                  <td>
                    <img src="{{url("storage/" . $post->thumbnail)}}" alt="">
                  </td>
                  <td>
                    @if ($post->status == 'Draft') 
                      <span class="badge badge-warning">
                    @elseif($post->status == 'Active')
                      <span class="badge badge-success">
                    @endif
                      {{$post->status}}
                    </span>
                  </td>
                  <td>
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('posts.destroy', $post->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
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

          <div class="container">
            {{ $posts->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection