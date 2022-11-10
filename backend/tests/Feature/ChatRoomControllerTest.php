<?php

namespace Tests\Feature;

use App\Http\Requests\StoreChatMessageRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ChatRoom;
use Mockery;

class ChatRoomControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $chatRoom = ChatRoom::factory()->create();
        $response = $this->getJson('/api/v1/chat/rooms');

        $response->assertStatus(200);
        $response->assertJson([$chatRoom->toArray()]);
    }
}
