<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ChatRoom;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(ChatRoom::exists()) {
        // return;
        ChatRoom::truncate(); 
      }
      
      ChatRoom::factory()
        ->count(10)
        ->sequence(fn ($sequence) => [
          'name' => 'チャットルーム' . $sequence->index + 1,
        ])
        ->create();
    }
}
