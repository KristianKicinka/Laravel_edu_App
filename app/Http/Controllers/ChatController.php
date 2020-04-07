<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Pusher\PusherException;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . \Auth::id() . "
        where users.id != " . \Auth::id() . "
        group by users.id, users.name, users.avatar, users.email");
        if(\Auth::user()->is_teacher==1) {
            return view("Backend.TeacherInterface.content.Chat.index")->with("users", $users);
        }else if(\Auth::user()->is_admin==1) {
            return view("Backend.AdminInterface.content.Chat.index")->with("users", $users);
        }else{
            return view("Backend.StudentInterface.content.Chat.index")->with("users", $users);
        }
    }

    public function getMessage($user_id){
        $my_id = \Auth::id();
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
        $messages = \DB::table('messages')->where(function ($query) use ($user_id,$my_id){
            $query->where('from',$my_id)->where('to',$user_id);
        })->orWhere(function ($query) use($user_id,$my_id){
            $query->where('from',$user_id)->where('to',$my_id);
        })->get();

        return view("Backend.StudentInterface.content.Chat.messages.index")->with('messages',$messages)->with("user_id",$user_id);
    }

    public function sendMessage(Request $request){
        $from = \Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'eu',
        );

        try {
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );
        } catch (PusherException $e) {
        }

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function videoCall($user_id){
        $receiver_id = $user_id;
        if(\Auth::user()->is_teacher==1) {
            return view("Backend.TeacherInterface.content.Chat.call.index")->with("recipient_id", $receiver_id);
        }else if(\Auth::user()->is_admin==1) {
            return view("Backend.AdminInterface.content.Chat.call.index")->with("recipient_id", $receiver_id);
        }else{
            return view("Backend.StudentInterface.content.Chat.call.index")->with("recipient_id", $receiver_id);
        }
    }

    public function authenticate(Request $request){
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;
        $pusher = new Pusher('b940dfa008d542bbb9bc','91cf8b5a6756b5fa22af','956583',[
           'cluster' => 'eu',
            'useTLS' =>true
        ]);
        $presence_data = ['name'=>auth()->user()->name];
        $key = $pusher->presence_auth($channelName,$socketId,auth()->id(),$presence_data);

        return response($key);
    }
}
