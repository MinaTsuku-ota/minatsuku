<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();
        DB::statement("ALTER TABLE subjects AUTO_INCREMENT = 1;");
        // 学科名
        $subjects = ['自動車整備科','電気システム科','メディアアート科','情報システム科','オフィスビジネス科','総合実務科'];
        foreach ($subjects as $subject) {
            DB::table('subjects')->insert(['subject' => $subject]);
        }
    }
}