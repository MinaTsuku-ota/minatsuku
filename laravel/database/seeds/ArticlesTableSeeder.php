<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
// use Faker\Factory as Faker;
// use Carbon\Carbon;
// use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Query Builderを使ってArticlesテーブルのレコードを全て削除
        DB::table('articles')->delete();
        DB::statement("ALTER TABLE articles AUTO_INCREMENT = 1;");

        // // Faker を使用してダミーデータを作成
        // $faker = Faker::create('en_US');
        // // 10件の Article データを作成
        // for ($i = 0; $i < 10; $i++) {
        //     Article::create([
        //         'title' => $faker->sentence(),
        //         'body' => $faker->paragraph(),
        //         'published_at' => Carbon::today(),
        //     ]);
        // }

        // ArticleFactory.phpを参照
        // factory() 関数に作成するモデルのクラス名と件数を指定して、DBにデータを作成
        // factory(App\Article::class, 20)->create();

        // ユーザーを１件取得してから、Article をそのユーザーに関連付けて作成
        // factory の create() メソッドに項目名と値の連想配列を渡すことで、factory で定義してる項目の設定内容を上書きすることができます
        // ArticleFactory の定義内容では１件の Article に対して毎回ユーザーを作成して user_id をセットするようになっていますが、それを上書きして、検索したユーザーの ID をセットしています
        // UserのSeederで1件だけrootという名前のユーザを登録しているので、それを取り出している
        $user = App\User::first();
        factory(App\Article::class, 10)->create([
            'user_id' => $user->id,
            'genre_id' => 1,
        ]);

    }
}
