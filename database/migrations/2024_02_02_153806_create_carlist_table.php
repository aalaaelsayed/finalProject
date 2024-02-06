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
        Schema::create('carlist', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('categoryId')->constrained('category');
            $table->string('carName');
            $table->tinyInteger('doors');
            $table->tinyInteger('passengers');
            $table->tinyInteger('luggage');
            $table->string('content');
            $table->tinyInteger('price');
            $table->boolean('active');
            $table->string('image',100);
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carlist');
    }
};
