<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_loan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_loan');
            $table->foreign('id_loan')->references('id')->on('loan')->onDelete('cascade');
            $table->unsignedBigInteger('id_book');
            $table->foreign('id_book')->references('id')->on('book')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_loan');
    }
};
