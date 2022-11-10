<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChatMessage;
use App\Models\ChatRoom;

class ChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(ChatMessage::exists()) {
        // return;
        ChatMessage::truncate(); 
      }
      $roomCount = ChatRoom::count();

      // user_id = 1 最後の1つのチャットルーム以外に参加していて、メッセージは最低1件送信済み      
      $user_id = 1;

      ChatMessage::factory()
        ->count($roomCount - 1)
        ->sequence(fn ($sequence) => [
          'chat_room_id' => $sequence->index + 1,
          'user_id' => $user_id,
          'message' => '初めまして！よろしくお願いします！',
        ])
        ->create();

      ChatMessage::factory()
        ->count(10)
        ->create([
          'chat_room_id' => 2,
          'user_id' => $user_id,
        ]);

        // user_id = 2 chat_room_id= 1でメッセージ1件投稿済み
        $user_id = 2;

        ChatMessage::factory()->create([
          'chat_room_id' => 1,
          'user_id' => $user_id,
          'message' => '初めまして！こちらこそよろしくお願いします！',
        ]);

    }
}
