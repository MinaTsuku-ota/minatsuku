<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        DB::statement("ALTER TABLE genres AUTO_INCREMENT = 1;");
        // ジャンル名
        $genres = ['WEB','写真','動画'];
        foreach ($genres as $genre) {
            DB::table('genres')->insert(['genre' => $genre]);
        }
    }
}
