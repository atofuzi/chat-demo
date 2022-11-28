<?php

namespace App\Http\Controllers;

use App\Events\ActionEvent;
use App\Http\Requests\StoreChatMessageRequest;
use App\Http\Requests\UpdateChatMessageRequest;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class ChatMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($chatRoomId)
    {
        $chatMessages = ChatMessage::where('chat_room_id', $chatRoomId)->orderBy('created_at', 'asc')->get();
        return $chatMessages->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatMessageRequest $request, $chartRoomId)
    {

        $userId = $request->id;
        $message = $request->chatMessage;
        $chatMessage = ChatMessage::create([
            'user_id' => $userId,
            'chat_room_id' => $chartRoomId,
            'message' => $message,
        ]);

        return $chatMessage->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ChatMessage $chatMessage)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatMessageRequest  $request
     * @param  \App\Models\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatMessageRequest $request, ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * リアルタイム通信のテスト用メソッド
     * TODO:実装完了後に削除する
     */
    public function action()
    {
        $actionId = "message1d";
        $actionData = "hello";
        log::debug('イベント発火');
        event(new ActionEvent($actionId, $actionData));
        return response('action', 200);
    }
}
