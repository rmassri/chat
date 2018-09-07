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
        return  Message::with('user')->get();
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
        $type='';
        if($request['path']!=false){
            $storage = \Storage::disk('public');
            $file = $request['path'];
            $name =$request['name'];
            $type_barra = explode('/', $file);
            $type_punto = explode(':', $type_barra[0]);

            if($type_punto[1]=='video'){
                $type='video';
            }else if($type_punto[1]=='application' || $type_punto[1]=='inode'){
                $type='application';
            }else{
                $type='image';
            }
            $base64_str = substr($file, strpos($file, ",")+1);
            $file = base64_decode($base64_str);
            //dd($file);

            //$path ='/img/questions';
            $fileName = uniqid().".". $name;
            $path = 'file/'.$fileName;
            $storage->put($fileName, $file);
        }
        //dd($file);
        
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'path' => $path,
            'type' => $type 
        ]);


        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!','message'=>$message];
    }
}
