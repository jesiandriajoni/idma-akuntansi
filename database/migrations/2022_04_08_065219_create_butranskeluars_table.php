<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButranskeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butranskeluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('dibayar');
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
        Schema::dropIfExists('butranskeluars');
    }
}
