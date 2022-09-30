<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButransmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butransmasuks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('notr');
            $table->string('diterima');
            $table->double('nominal');
            $table->text('ket');
            $table->string('terbilang');
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
        Schema::dropIfExists('butransmasuks');
    }
}
