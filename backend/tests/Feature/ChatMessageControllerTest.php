<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChatMessageControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/v1/chat/room/1/messages/');

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $chatRoomId = 1;
        $body = [
          'chatMessage' => 'テストメッセージ'
        ];
        $response = $this->post("/api/v1/chat/room/${chatRoomId}/message/", $body);

        $response->assertStatus(200);
    }
}
