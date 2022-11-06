<?php

namespace Database\Seeders;

use App\Models\ChatRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ChatRoomUser;
use App\Models\User;

class ChatRoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(ChatRoomUser::exists()) {
        ChatRoomUser::truncate();
      }
      $roomCount = ChatRoom::count();

      // user_id = 1は全てのチャットルームに参加している
      ChatRoomUser::factory()
      ->count($roomCount)
      ->sequence(fn ($sequence) => [
        'chat_room_id' => $sequence->index + 1,
        'user_id' => 1,
      ])
      ->create();

      $users = User::where('id', '!=', 1)->get();
      $chatRoom = ChatRoom::all();
      
      for ($i = 0; $i < count($users); $i++) {
        ChatRoomUser::factory()->create([
          'chat_room_id' => $chatRoom[$i]->id,
          'user_id' => $users[$i]->id,
        ]);
      }

      // 最後のチャットルームは3人参加しているルームとする
      ChatRoomUser::factory()->create([
        'chat_room_id' => $chatRoom[$roomCount - 1]->id,
        'user_id' => 2,
      ]);
      ChatRoomUser::factory()->create([
        'chat_room_id' => $chatRoom[$roomCount - 1]->id,
        'user_id' => 3,
      ]);
    }
}
