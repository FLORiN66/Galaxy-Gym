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
//        \App\Models\User::factory(100)->create();
        DB::table('users')->insert([
            'name' => 'demo',
            'email' => 'demo@demo.com',
            'password' => bcrypt('demo'),
            'role'  => 'administrator'
        ]);


        $settings = [
          ['name' => 'image', 'value' => ''],
          ['name' => 'about', 'value' => ''],
          ['name' => 'email', 'value' => ''],
          ['name' => 'address', 'value' => ''],
          ['name' => 'phone', 'value' => ''],
        ];
        Settings::insert($settings);
    }
}
