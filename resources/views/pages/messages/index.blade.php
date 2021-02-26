@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Messages</h3>
              <a href="{{route('messages.create')}}" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Create Message</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('messages.search')}}" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert keyword or uuid ...">
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
                  <th>Message UUID</th>
                  <th>From</th>
                  <th>Keyword</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($messages as $message)
                <tr>
                  <td>{{ $message->id }}</td>
                  <td>{{ Str::substr($message->created_at, 0, 10) }}</td>
                  <td>{{ $message->message_uuid }}</td>
                  <td>{{ $message->user->name }}</td>
                  <td>{{ $message->keyword }}</td>
                  <td>
                    @if($message->status == 'Pending')
                      <span class="badge badge-warning">
                    @elseif($message->status == 'On Going')
                      <span class="badge badge-primary">
                    @elseif($message->status == 'Closed')
                      <span class="badge badge-danger">
                    @endif
                    {{ $message->status }}</td>
                  <td>
                    <a href="{{route('messages.edit', $message->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('messages.destroy', $message->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              
                @empty
                <tr>
                  <td colspan="7" class="text-center p-5">Data not available</td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="container">
            {{ $messages->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection