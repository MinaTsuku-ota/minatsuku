<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Storage;

class AddAvaterToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avater'); // アバター(サムネイル)
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
            /* storageの画像を削除 */
            $users = App\User::get();
            foreach($users as $user){
                // default_avater.pngは消さない
                if($user->avater != "default_avater.png"){
                    Storage::disk('avaters')->delete($user->avater);
                }
            }

            $table->dropColumn('avater');
        });
    }
}
