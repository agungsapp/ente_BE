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
        Schema::create('warungMakan', function (Blueprint $table) {

            $table->id();
            $table->string('name', 30);
            $table->string('url_photo', 255);
            $table->string('description', 2550)->nullable();
            $table->string('price_range', 50);
            $table->string('location', 15);
            $table->string('address', 255);
            $table->string('type', 15);
            $table->string('url_menu', 255)->nullable();
            $table->float('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warungMakan');
    }
};
