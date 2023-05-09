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
        Schema::create('socks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->string('color');
            $table->string('size');
            $table->string('sku');
            $table->string('image')->nullable();
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socks');
    }
};
