<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'role_name' => 'オペレータ',
            ],
            [
                'id' => 2,
                'role_name' => '営業マン',
            ],
            [
                'id' => 3,
                'role_name' => 'エンド'
            ]
        ]);
    }
}
