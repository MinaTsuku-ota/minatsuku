<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            // SEEDERファイルの読み込み、順番に注意
            SubjectsTableSeeder::class,
            UsersTableSeeder::class,
            ArticlesTableSeeder::class,
            // OtherTableSeeder::class,
        ]);
    }
}
