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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('logo');
            $table->text('description');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('telegram')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('verified')->default(0);
            $table->boolean('status')->default(1);
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop');
    }
};
