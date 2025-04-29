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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
        
            $table->string('name'); // VARCHAR NOT NULL
        
            $table->unsignedBigInteger('brand_id'); // INTEGER NOT NULL REFERENCES brands(id)
            $table->unsignedBigInteger('category_id'); // INTEGER NOT NULL REFERENCES categories(id)
            $table->unsignedBigInteger('color_id'); // INTEGER NOT NULL REFERENCES colors(id)
        
            $table->float('price'); // FLOAT NOT NULL
            $table->integer('stockquantity'); // INTEGER NOT NULL
        
            $table->text('short_description')->nullable(); // TEXT (nullable by default unless NOT NULL specified)
            $table->text('description')->nullable(); // TEXT (nullable)
        
            $table->timestamps(); // created_at and updated_at with default NOW()
        
            // Foreign key constraints
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
