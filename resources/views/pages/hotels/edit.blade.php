@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Hotel Data</strong>
    </div>
    <div class="card-body card-block">
      <form action="{{route('hotels.update', $hotel->id)}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama" class="form-control-label">Nama Hotel</label>
          <input type="text" name="nama" value="{{ old('nama') ? old('nama') : $hotel->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror">
          {{-- jika error tampilkan message --}}
          @error('name')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="manager" class="form-control-label">Nama Manager</label>
          <input type="text" name="manager" value="{{ old('manager') ? old('manager') : $hotel->manager }}" id="manager" class="form-control @error('manager') is-invalid @enderror">
          {{-- jika error tampilkan message --}}
          @error('manager')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="alamat" class="form-control-label">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') ? old('alamat') : $hotel->alamat }}</textarea>
          @error('alamat')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col col-lg-4 col-md-4 col-sm-4">
            <div class="form-group">
              <label for="telp" class="form-control-label">No Telpon</label>
              <input type="number" name="kode" value="{{ old('kode') ? old('kode') : $hotel->kode }}" id="kode" class="form-control @error('kode') is-invalid @enderror" placeholder="kode wilayah (optional) ..">
              @error('kode')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col col-lg-8 col-md-8 col-sm-8">
            <div class="form-group">
              <label for="telp" class="form-control-label"></label>
              <input type="number" name="telp" value="{{ old('telp') ? old('telp') : $hotel->telp }}" id="telp" class="mt-2 form-control @error('telp') is-invalid @enderror" placeholder="nomor kantor (tanpa kode)/ nomor handphone ..">
              @error('telp')
              <div class="text-muted">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kamar" class="form-control-label">Jumlah Kamar</label>
          <input type="number" name="kamar" value="{{ old('kamar') ? old('kamar') : $hotel->kamar }}" id="kamar" class="form-control @error('kamar') is-invalid @enderror">
          @error('kamar')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="operasi" class="form-control-label">Tanggal Mulai Operasi</label>
          <input type="date" name="operasi" value="{{ old('operasi') ? old('operasi') : $hotel->operasi }}" id="operasi" class="form-control @error('operasi') is-invalid @enderror">
          @error('operasi')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Update Hotel</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('hotels') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection