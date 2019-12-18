<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update2UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // subjectsテーブルへの外部キーとしたい
            $table->unsignedBigInteger('subject_id');

            // 外部キーを追加
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects');
                // 親テーブルのsubjectsのレコードが削除されてもuserは削除しない
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_subject_id_foreign');
            $table->dropColumn('subject_id');
        });
    }
}
