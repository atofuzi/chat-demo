<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(User::exists()) {
        User::truncate();
      }
      
      \App\Models\User::factory()
        ->count(10)
        ->sequence(fn ($sequence) => [
            'name' => 'テストユーザ' . $sequence->index,
            'email' => 'test' . $sequence->index . '@email.com'
          ])
        ->create();
    }
}
