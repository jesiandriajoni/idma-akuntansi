<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldNotransaksiToButransmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('butransmasuks', function (Blueprint $table) {
            //
            Schema::table('butransmasuks', function (Blueprint $table) {
                $table->string('notr')->after('tanggal');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('butransmasuks', function (Blueprint $table) {
            //
        });
    }
}
