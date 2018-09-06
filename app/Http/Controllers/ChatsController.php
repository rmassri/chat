<?php

namespace App\Http\Controllers;

use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        $path = '';
        
        if($request->file('file')!=false){
            $storage = \Storage::disk('public');
            $file = $request->file('file');
            //$path ='/img/questions';
            $fileName = uniqid().".". $file->getClientOriginalName();
            $path ='file/'.$file->getClientOriginalName();
            $storage->put($fileName, file_get_contents($file),'public');
        }
        //dd($file);
        
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'path' => $path 
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
