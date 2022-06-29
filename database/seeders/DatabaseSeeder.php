<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        DB::table('users')->insert([
            'name' => 'demo',
            'email' => 'demo@demo.com',
            'password' => bcrypt('demo'),
            'role'  => 'administrator'
        ]);


        $settings = [
          ['name' => 'image', 'value' => '/'],
          ['name' => 'about', 'value' => null],
          ['name' => 'email', 'value' => null],
          ['name' => 'address', 'value' => null],
          ['name' => 'phone', 'value' => null],
        ];
        Settings::insert($settings);
    }
}
