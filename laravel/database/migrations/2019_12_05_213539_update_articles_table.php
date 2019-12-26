<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Storage;

class UpdateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            /* storageの画像を削除 */
            // 全記事データを配列で取得
            $articles = App\Article::get();
            // foreachでレコード毎に画像の有無をチェックしてstorageの画像を削除
            foreach($articles as $article){
                // 記事に画像があるかチェック
                // if(isset($article->image1) || isset($article->image2) || isset($article->image3)){
                    // storageの画像を削除
                    Storage::disk('uploaded_images')->delete($article->image1);
                    Storage::disk('uploaded_images')->delete($article->image2);
                    Storage::disk('uploaded_images')->delete($article->image3);
                // }
            }

            $table->dropColumn('image1');
            $table->dropColumn('image2');
            $table->dropColumn('image3');
        });
    }
}
