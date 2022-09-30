<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldLevelIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//untuk migration
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('level_id')->unsigned()->index()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//menjalankan rollback(atau mundur/ menghapus)
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('level_id');
        });
    }
}
