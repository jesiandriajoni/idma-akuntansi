<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalumumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnalumums', function (Blueprint $table) {
            $table->id();
            $table->string('no_akun',100);
            $table->text('akun',200);
            $table->text('deskripsi',200);
            $table->string('referensi',200);
            $table->double('debit');
            $table->double('kredit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnalumums');
    }
}
