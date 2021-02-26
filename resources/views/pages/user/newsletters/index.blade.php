@extends('layouts.user_default')

@section ('content')
<div class="orders">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col col-lg-8 col-md-8 col-sm-12">
              <h3 class="mr-4 d-inline-block">Newsletters</h3>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-12">
              <div class="right-align">
                <form action="{{route('user.newsletters.search')}}" method="GET">
                  <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Insert some words ...">
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
                  <th colspan="5" class="text-center text-dark"><h4>HOT !! Special Just For You !!</h4></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <br>
            <div class="container">
              <div class="container">
              @forelse ($newsletters as $newsletter)
                <tr>
                  <td colspan="5">
                    <img src="{{url("storage/" . $newsletter->thumbnail)}}" alt="{{ $newsletter->title }}">
                  </td>
                  <td colspan="5">
                    <p class="blockquote-footer">Admin <cite title="Source Title">{{ Str::substr($newsletter->created_at, 0, 10) }}</cite></p>
                  </td>
                  <td colspan="5">
                    {!!$newsletter->article!!}
                  </td>
                </tr>

              @empty
                <tr>
                  <td colspan="5" class="text-center p-5">Data not available</td>
                </tr>
              @endforelse
            </div>
            </div>  
          </div>

          <br>
          <hr>
          <div class="container">
            {{ $newsletters->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection