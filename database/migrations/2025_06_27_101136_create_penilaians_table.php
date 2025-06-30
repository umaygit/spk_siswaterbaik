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
    Schema::create('penilaians', function (Blueprint $table) {
        $table->id('id_penilaian');
        $table->unsignedBigInteger('id_siswa');
        $table->unsignedBigInteger('id_kriteria');
        $table->unsignedBigInteger('id_sub_kriteria');
        $table->integer('nilai')->nullable(); // nilai bisa berasal dari sub_kriteria atau manual
        $table->timestamps();

        $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade');
        $table->foreign('id_kriteria')->references('id_kriteria')->on('kriterias')->onDelete('cascade');
        $table->foreign('id_sub_kriteria')->references('id_sub_kriteria')->on('sub_kriterias')->onDelete('cascade');
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
