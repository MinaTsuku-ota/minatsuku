<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::statement("ALTER TABLE users AUTO_INCREMENT = 1;");

        App\User::create([
            'name' => 'root',
            // 一旦名前とパスワードだけにする
            // 'email' => 'root@example.com',
            'password' => Hash::make('password'),
            'subject' => '情報システム科',
        ]);
    }
}
