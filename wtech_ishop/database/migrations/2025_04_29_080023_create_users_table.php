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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Equivalent to SERIAL PRIMARY KEY
            $table->string('username'); // VARCHAR NOT NULL
            $table->string('role'); // VARCHAR NOT NULL
            $table->string('email')->unique(); // VARCHAR NOT NULL UNIQUE
            $table->string('password'); // VARCHAR NOT NULL
            $table->timestamp('created_at')->useCurrent(); // TIMESTAMP NOT NULL DEFAULT NOW()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
