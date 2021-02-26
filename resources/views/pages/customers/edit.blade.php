@extends('layouts.default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Edit Customer Profile</strong>
    </div>
    <div class="card-body card-block">
      @if( is_null($customer->photo) )
        <img src="{{ url('http://placehold.it/200x200') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
      @elseif( $customer->photo )
        <img src="{{ url("storage/" . $customer->photo) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 200px">
      @endif
      
      <form action="{{ route('customers.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        {{-- @method('PUT') --}}
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Name</label>
          <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : $user->name }}" class="form-control  @error('name') is-invalid @enderror">
          {{-- jika error tampilkan message --}}
          @error('name')
          <div class="text-muted"></div>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="form-control-label">Email</label>
          <input type="text" name="email" id="email" value="{{ old('email') ? old('email') : $user->email }}" class="form-control @error('email') is-invalid @enderror" readonly>
          @error('email')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="address" class="form-control-label">Address</label>
          <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{ old('address') ? old('address') : $customer->address }}</textarea>
          @error('address')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="phone" class="form-control-label">Phone</label>
          <input type="number" name="phone" id="phone" value="{{ old('phone') ? old('phone') : $customer->phone }}" class="form-control  @error('phone') is-invalid @enderror">
          @error('phone')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="birth" class="form-control-label">Birth</label>
          <input type="date" name="birth" id="birth" value="{{ old('birth') ? old('birth') : $customer->birth }}" class="form-control  @error('birth') is-invalid @enderror">
          @error('birth')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="gender" class="form-control-label">Gender</label>
          <select class="form-control" id="gender" name="gender" ">
            <option @if($customer->gender === "Male") selected @endif>Male</option>
            <option @if($customer->gender === "Female") selected @endif>Female</option>
          </select>
        </div>
        <div class="form-group">
          <label for="photo">Change Photo</label>
          <input type="file" name="photo" class="form-control-file" accept="image/*" id="photo" @error('photo') is-invalid @enderror">
          @error('photo')
          <div class="text-muted">{{ $message }}</div>
          @enderror
        </div>
        <hr>
        {{-- tombol submit --}}
        <div class="form-group mt-4">
          <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <button class="btn btn-primary btn-block" type="submit">Save</button>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-6">
              <a href="{{ route('customers') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection