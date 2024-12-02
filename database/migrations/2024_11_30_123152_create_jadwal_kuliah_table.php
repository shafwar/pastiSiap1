<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKuliahTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('mata_kuliah');  // Course name
            $table->string('day');          // Day of the schedule
            $table->string('time');         // Time slot
            $table->integer('sks');         // SKS (credit hours)
            $table->string('ruang');        // Room
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('draft'); // Status
            $table->timestamps();           // Timestamps for created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
}
