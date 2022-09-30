<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldNotransaksiToButranskeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('butranskeluars', function (Blueprint $table) {
            //
            Schema::table('butranskeluars', function (Blueprint $table) {
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
        Schema::table('butranskeluars', function (Blueprint $table) {
            //
        });
    }
}
