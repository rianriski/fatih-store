@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Newsletters</h3>
              <a href="{{route('newsletters.create')}}" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Create</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('newsletters.search')}}" method="GET">
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
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($newsletters as $newsletter)
                <tr>
                  <td>{{ $newsletter->id }}</td>
                  <td>
                    <img src="{{url("storage/" . $newsletter->thumbnail)}}" alt="{{ $newsletter->title }}">
                  </td>
                  <td>{{ $newsletter->title }}</td>
                  <td>
                    @if ($newsletter->status == 'Draft') 
                      <span class="badge badge-warning">
                    @elseif($newsletter->status == 'Active')
                      <span class="badge badge-success">
                    @endif
                      {{$newsletter->status}}
                    </span>
                  </td>
                  <td>
                    <a href="{{route('newsletters.edit', $newsletter->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('newsletters.destroy', $newsletter->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
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
            {{ $newsletters->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection