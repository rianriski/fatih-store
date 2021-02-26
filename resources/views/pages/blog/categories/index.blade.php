@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row container">
            <h3 class="mr-4">Post Categories</h3>
            <a href="{{ route('post.categories.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Create</a>
          </div>
        </div>

        <div class="card-body--">
          <div class="table-stats order-table ov-h">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($categories as $cat)
                <tr>
                  <td>{{ $cat->id }}</td>
                  <td>{{ $cat->category }}</td>
                  <td>{{ $cat->description }}</td>
                  <td>
                    <a href="{{ route('post.categories.edit', $cat->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{ route('post.categories.destroy', $cat->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              
                @empty
                <tr>
                  <td colspan="4" class="text-center p-5">Data not available</td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="container">
            {{ $categories->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection