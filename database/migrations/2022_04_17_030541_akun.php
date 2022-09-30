<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Akun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('akuns', function (Blueprint $table) {
            $table->id();
            $table->string('no_akun',100);
            $table->text('akun', 200);
            $table->string('nama_kategori', 100);
            $table->text('deskripsi',200);
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
        //
    }
}
