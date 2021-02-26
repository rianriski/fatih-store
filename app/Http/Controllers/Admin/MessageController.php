<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Http\Requests\MessageRequest;
use App\Models\MessageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.messages.index')->with([
            'messages' => $messages
        ]);
    }

    public function create()
    {
        $ticket = Str::upper("CONVER" . uniqid());

        return view('pages.messages.create')->with([
            'ticket' => $ticket
        ]);
    }

    public function store(MessageRequest $request)
    {
        $photo = null;
        $pending = "Pending";

        if ($request->file('photo')) {
            $photo = $request->file('photo')->store('photos');
        }

        Message::create([
            'user_id' => $request->user_id,
            'message_uuid' => $request->message_uuid,
            'keyword' => $request->keyword,
            'photo' => $photo,
            'status' => $pending,
        ]);

        if ($request->user_id == 1) {
            MessageDetail::create([
                'message_uuid' => $request->message_uuid,
                'user_id' => $request->user_id,
                'message' => $request->message,
                'user_read' => $pending,
            ]);
        } elseif ($request->user_id != 1) {
            MessageDetail::create([
                'message_uuid' => $request->message_uuid,
                'user_id' => $request->user_id,
                'message' => $request->message,
                'admin_read' => $pending,
            ]);
        }

        return redirect()
            ->route('user.messages')
            ->with('success', 'The conversation has been added successfully');
    }

    public function chatStore(Request $request, $message_id, $user_id, $uuid)
    {
        MessageDetail::create([
            'message_uuid' => $uuid,
            'user_id' => $user_id,
            'message' => $request->message,
        ]);

        return redirect()->route('messages.edit', $message_id);
    }

    public function close($message_id)
    {
        $model = Message::where('id', $message_id);

        $model->update([
            'status' => "Closed"
        ]);

        return redirect()->route('messages');
    }


    public function search(Request $request)
    {
        $search = $request->get('search');

        $messages = Message::where('message_uuid', 'like', '%' . $search . '%')
            ->orWhere('keyword', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.messages.index')->with([
            'messages' => $messages
        ]);
    }

    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $message_uuid = Message::where('id', $id)->pluck('message_uuid');
        $messageDetails = MessageDetail::where('message_uuid', $message_uuid[0])->get();
        $auth_id = Auth::id();

        return view('pages.messages.edit')->with([
            'message' => $message,
            'messageDetails' => $messageDetails,
            'auth_id' => $auth_id
        ]);
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $photo = Message::where('id', $id)->pluck('photo');
        $uuid = Message::where('id', $id)->pluck('message_uuid');
        // dd([$photo, $uuid]);

        DB::table('message_details')
            ->where('message_uuid', $uuid[0])
            ->delete();

        $message->delete();

        if ($photo) {
            Storage::delete($photo[0]);
        }

        return redirect()
            ->route('messages')
            ->with('danger', 'The conversation has been deleted successfully');
    }
}
