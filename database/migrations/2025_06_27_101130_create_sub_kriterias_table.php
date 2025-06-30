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
    Schema::create('sub_kriterias', function (Blueprint $table) {
        $table->id('id_sub_kriteria');
        $table->unsignedBigInteger('id_kriteria');
        $table->string('nm_sub_kriteria', 100);
        $table->integer('nilai');
        $table->timestamps();

        $table->foreign('id_kriteria')->references('id_kriteria')->on('kriterias')->onDelete('cascade');
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kriterias');
    }
};
