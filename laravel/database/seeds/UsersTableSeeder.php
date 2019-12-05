<?php

use Illuminate\Database\Seeder;

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

        App\User::create([
            'name' => 'root',
            // 一旦名前とパスワードだけにする
            // 'email' => 'root@example.com',
            'password' => Hash::make('password'),
            'subject' => '情報システム科',
        ]);
    }
}
