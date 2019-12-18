<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // dropUnique→dropColumn
            $table->dropUnique('users_email_unique');
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');

            //nameで認証するのでuniqueとする
            $table->unique('name');
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
            $table->dropUnique('users_name_unique');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
        });
    }
}
