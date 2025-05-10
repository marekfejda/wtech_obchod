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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id SERIAL PRIMARY KEY
        
            // Foreign key to users.id
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        
            // temp_user_id without foreign key
            $table->integer('temp_user_id')->nullable();
        
            $table->string('name_surname');
            $table->string('address_streetnumber');
            $table->string('PSC'); // quoted in SQL, no problem here
            $table->string('city_country');
            $table->string('phone_number');
            $table->string('email');
            $table->string('payment_type');
        
            $table->unsignedBigInteger('card_number')->nullable();
            $table->string('exp_date')->nullable();
            $table->integer('cvc')->nullable();
            $table->string('card_holder')->nullable();
            $table->string('state')->nullable();
        
            $table->timestamp('created_at')->useCurrent();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
