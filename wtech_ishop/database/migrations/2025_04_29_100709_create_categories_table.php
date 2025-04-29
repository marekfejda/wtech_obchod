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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
            $table->string('category'); // VARCHAR NOT NULL
            $table->string('icon'); // VARCHAR NOT NULL
            $table->string('slug'); // VARCHAR NOT NULL
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
