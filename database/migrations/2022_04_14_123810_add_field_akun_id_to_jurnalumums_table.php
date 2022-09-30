<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldAkunIdToJurnalumumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jurnalumums', function (Blueprint $table) {
            $table->bigInteger('akun_id')->unsigned()->index()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jurnalumums', function (Blueprint $table) {
            //
            $table->dropColumn('akun_id');
        });
    }
}
