@extends('layouts.user_default')

@section ('content')
  <div class="card">
    <div class="card-header">
      <strong>Message Detail</strong>
    </div>
    <div class="card-body card-block">
      <div class="row">
        <div class="col col-lg-5 col-md-5 col-sm-12">
          <h5>Ticket</h5>
          <p>{{ $message->message_uuid }}</p>
          <hr>
          <h5>Keyword</h5>
          <p>{{ $message->keyword }}</p>
          <hr>
          <h5 class="mb-3">Additional Picture</h5>

          @if( is_null($message->photo) )
            <img src="{{ url('http://placehold.it/300x300') }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 300px; height: 300px; object-fit:cover; object-position:center">
          @elseif( $message->photo )
            <img src="{{ url("storage/" . $message->photo) }}" alt="..." class="img-thumbnail img-fluid mb-4" style="width: 300px; height: 300px; object-fit:cover; object-position:center">
          @endif
          
          <hr>
        </div>
        <div class="col col-lg-6 col-md-8 col-sm-12 border border-secondary ml-5 mr-2">
          <br>
          <table class="table table-striped">

            @forelse ($messageDetails as $messageDetail)

              @if($messageDetail->user_id == 1)
              <tr>
                <td>
                  <p class="blockquote-footer">{{ $messageDetail->user->name }} <cite title="Source Title">{{Str::substr($messageDetail->created_at, 0, 10)}}</cite></p>
                  <p style="margin-top: -10px">{{ $messageDetail->message }}</p>
                </td>
              </tr>
              @else
              <tr>
                <td>
                  <p class="blockquote-footer text-right">{{ $messageDetail->user->name }} <cite title="Source Title">{{Str::substr($messageDetail->created_at, 0, 10)}}</cite></p>
                  <p class="text-right" style="margin-top: -10px">{{ $messageDetail->message }}</p>
                </td>
              </tr>
              @endif

            @empty
                
            @endforelse
          </table>
          <hr>
          <form action="{{ route('user.messages.chat.store', [$message->id, $auth_id, $message->message_uuid]) }}" method="POST">
            <div class="row">
              @csrf
              <div class="col col-lg-10 col-md-10 col-sm-8">
                <input type="text" name="message" value="{{ old('message') }}" class="form-control" placeholder="Input your text here ...">
              </div>
              <div class="col col-lg-2 col-md-2 col-sm-4">
                <button class="btn btn-info text-white btn-block" type="submit"><i class="fa fa-location-arrow"></i></button>
              </div>
            </div>
            <br>
          </form>
        </div>
      </div>
      <br>
      <hr>
      <div class="row">
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-primary text-white mt-3 btn-block" href="{{ route('user.messages') }}"><i class="fa fa-reply mr-2"></i>Back to List</a>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-6">
          <a class="btn btn-danger text-white mt-3 btn-block" href="{{route('user.messages.chat.close', $message->id)}}"><i class="fa fa-ban mr-2"></i>Close Conversation</a>
        </div>
      </div>
    </div>
  </div>
@endsection