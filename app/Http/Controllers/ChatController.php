<?php

namespace App\Http\Controllers;

use App\Events\NewCategoryAdded;
use App\Helper\ResponseHandler;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function showChat($id)
    {
        $user = [
            'id' => 1,
            'name' => 'Marina',
            'avatar' => 'https://bootdey.com/img/Content/avatar/avatar1.png',
            'active' => true,
            'statusIcon' => "fa fa-circle text-success",
            'statusText' => "Online",
        ];
        ResponseHandler::success('messages', ['user' => $user]);
    }

    public function storeMessage(Request $request, $id)
    {
        $message = [
            "text"=> $request->message,
            "time"=>Carbon::now()->toDateTimeString(),
            "avatar"=> 'https://bootdey.com/img/Content/avatar/avatar1.png',
            "mine"=> true
        ];
        event(new NewCategoryAdded($message['text'], $id));

        return ResponseHandler::success('message added', ['message' => $message]);
    }
}
