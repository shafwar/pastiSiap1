<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangs', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('kode'); // Kolom kode untuk kode ruang
            $table->integer('kapasitas'); // Kolom kapasitas untuk kapasitas ruang
            $table->string('prodi'); // Kolom prodi untuk program studi terkait ruang
            $table->string('status'); // Kolom status untuk status ruang (Tersedia/Unavailable)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangs');
    }
}
