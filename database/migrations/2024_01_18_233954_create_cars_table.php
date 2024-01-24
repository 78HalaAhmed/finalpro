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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->integer('luggage');
            $table->integer('doors');
            $table->integer('passengers');
            $table->float('price');
            $table->boolean('active');
            $table->string('image',100);
            $table->foreignId('category_id')->constrained('categories');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
