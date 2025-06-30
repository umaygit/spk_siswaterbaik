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
    Schema::create('hasils', function (Blueprint $table) {
        $table->id('id_hasil');
        $table->unsignedBigInteger('id_siswa');
        $table->float('nilai_akhir');
        $table->integer('peringkat')->nullable();
        $table->timestamps();

        $table->foreign('id_siswa')->references('id_siswa')->on('siswas')->onDelete('cascade');
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasils');
    }
};
