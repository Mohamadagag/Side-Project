<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function getAllMessages(){
        return Message::all();
    }

    public function getMessageById($id){
        return Message::find($id);
    }

    public function createMessage(Request $request){
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->title = $request->title;
        $message->content = $request->content;
        $message->save();
        return $message;
    }

    public function deleteMessage($id){
        $message = Message::find($id);
        if(isset($message)){
            $message->delete();
            $respond = [
                'status' => 201,
                'message' => 'Message deleted successfully',
                'data' => $message,
            ];
        }
        else{
            $respond = [
                'status' => 403,
                'message' => 'Message not found',
            ];
        }

        return $message;
    }

    public function updateMessage(Request $request, $id){
        $message = Message::find($id);
        if(isset($message)){
            $message->name = $request->name;
            $message->email = $request->email;
            $message->title = $request->title;
            $message->content = $request->content;
            $message->save();

            $respond = [
                'status' => 201,
                'message' => 'Message updated',
                'data' => $message,
            ];
        }
        else{
            $respond = [
                'status' => 403,
                'message' => 'Message not found',
            ];
        }

        return $respond;
    }
}
