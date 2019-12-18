<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->bigIncrements('id');
            // usersテーブルへの外部キー
            $table->unsignedBigInteger('user_id');
            // $table->string('title'); // ご意見タイトル
            $table->text('body'); // ご意見内容
            $table->timestamps();

            // user(親)のデータが削除されたらopinion(子)を削除
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opinions');
    }
}
