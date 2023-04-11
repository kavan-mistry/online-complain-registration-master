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
        Schema::create('reopen_complain', function (Blueprint $table) {
            $table->integer('reopen_id');
            $table->unsignedBigInteger('complain_id');
            $table->foreign('complain_id')->references('complain_id')->on('complain')->onDelete('cascade');
            $table->string('feedback');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reopen_complain');
    }
};
