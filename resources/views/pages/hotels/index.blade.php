@extends('layouts.default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Master Hotel</h3>
              <a href="{{route('hotels.create')}}" class="btn btn-primary btn-sm d-inline-block" style="margin-top: -8px"><i class="fa fa-plus mr-2"></i>Add Hotel</a>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('hotels.search')}}" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Masukkan nama hotel ...">
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
                  <th>Id</th>
                  <th>Hotel</th>
                  <th>Manager</th>
                  <th>Alamat</th>
                  <th>Telpon</th>
                  <th>Kamar</th>
                  <th>Operasi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
                @forelse ($hotels as $hotel)
                <tr>
                  <td>{{ $hotel->id }}</td>
                  <td>{{ $hotel->nama }}</td>
                  <td>{{ $hotel->manager }}</td>
                  <td>{{ $hotel->alamat }}</td>
                  @if (is_null($hotel->kode))
                    <td>{{ $hotel->telp }}</td>
                  @elseif ($hotel->kode)
                    <td>({{ $hotel->kode }}) {{ $hotel->telp }}</td>
                  @endif
                  <td>{{ $hotel->kamar }}</td>
                  <td>{{ $hotel->operasi }}</td>
                  <td>
                    <a href="{{route('hotels.edit', $hotel->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                    <form action="{{route('hotels.destroy', $hotel->id)}}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                      @csrf
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              
                @empty
                <tr>
                  <td colspan="8" class="text-center p-5">Data not available</td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>

          <div class="container">
            {{ $hotels->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection