<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatMessage>
 */
class ChatMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'chat_room_id' => fake()->numberBetween(1, 100),
          'user_id' => fake()->randomNumber(1, 10),
          'message' => fake()->realText(rand(10, 254)),
        ];
    }
}
