@extends('layouts.user_default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Comments</h3>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert some comments ...">
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
                  <th>Date</th>
                  <th>Post Title</th>
                  <th>Comment</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($comments as $comment)
                <tr>
                  <td>{{ $comment->id }}</td>
                  <td>{{ Str::substr($comment->created_at, 0, 10) }}</td>
                  <td>{{ $comment->post->title }}</td>
                  <td>{{ $comment->comment }}</td>
                  <td>
                    <a href="{{route('user.comments.edit', $comment->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                  </td>
                </tr>
              
                @empty
                <tr>
                  <td colspan="5" class="text-center p-5">Data not available</td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="container">
            {{ $comments->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection