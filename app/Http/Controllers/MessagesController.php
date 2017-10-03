<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function getMessages()
    {
        $messages = Message::with('user')->get();
        return $messages;
    }

    public function postMessage(Request $request)
    {
        /** @var Message $message */
        $message = Message::create([ 'text' => $request->get('text'), 'user_id' => Auth::user()->id ]);
        broadcast(new MessageEvent([ 'text' => $message->text, 'name' => $message->user->name ]))->toOthers();
        return [ 'status' => true ];
    }
}
