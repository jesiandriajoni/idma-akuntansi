<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldJabatanToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            //kodingan untuk menambahkan kolom tabel satu ke tabel lainnya
            //menambahkan field level_id di tabel users(hal seperti ini tidak perlu membuat tabel baru cuma buat migration saja)
            $table->string('jabatan')->nullable()->index()->after('password');
            $table->string('jeniskelamin')->nullable()->index()->after('jabatan');
            $table->string('telp')->nullable()->index()->after('jeniskelamin');
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
        Schema::table('users', function (Blueprint $table) {
            //jika kita migrate menggunakan rollback maka kodingan yg akan dipanggil adalah dibawah ini
            $table->dropColumn('jabatan');
            $table->dropColumn('jeniskelamin');
            $table->dropColumn('telp');
        });
    }

}
