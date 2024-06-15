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
        Schema::create('products_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('review');
            $table->double('rating',3,2);
            $table->integer('status')->default(0) ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_ratings');
    }
};
