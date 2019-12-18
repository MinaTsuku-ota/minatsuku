<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Article;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            // usersテーブルへの外部キーを登録
            // ユーザ1に対して記事nの関係。ユーザテーブルが親テーブルとなる
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();

            // Users(親)のデータが削除されたらArticles(子)を削除
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('favs_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // /* storageの画像を削除 */
        // // 全記事データを配列で取得
        // $articles = Article::get();
        // // foreachでレコード毎に画像の有無をチェックしてstorageの画像を削除
        // foreach($articles as $article){
        //     // 記事に画像があるかチェック
        //     // if(isset($article->image1) || isset($article->image2) || isset($article->image3)){
        //         // storageの画像を削除
        //         Storage::disk('public')->delete($article->image1);
        //         Storage::disk('public')->delete($article->image2);
        //         Storage::disk('public')->delete($article->image3);
        //         echo 'create_articles_table echo';

        //     // }
        // }

        Schema::dropIfExists('articles');
    }
}
