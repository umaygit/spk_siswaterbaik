<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('kriterias', function (Blueprint $table) {
        $table->id('id_kriteria');
        $table->string('nama_kriteria', 100);
        $table->string('kode_kriteria', 5);
        $table->integer('bobot'); // persen
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
