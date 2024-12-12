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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->text('description')->max(400);
            $table->string('image_uri', 255)->nullable();
            $table->string('content_uri', 255); 
            $table->string('pdf_uri', 255);            
            $table->timestamps();
            $table->foreignId('level_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
