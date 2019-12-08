<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenreIdToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // genresテーブルへの外部キーとしたい
            $table->unsignedBigInteger('genre_id');

            // 外部キーに設定
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres');
                // 親テーブルgenresのレコードが削除されてもarticleは削除しない
                //->onDelete('cascade');
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
            $table->dropForeign('articles_genre_id_foreign');
            $table->dropColumn('genre_id');
        });
    }
}
