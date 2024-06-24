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
        Schema::create('news_viewers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news')->cascadeOnDelete();
            $table->string('ip');
            $table->string('country');
            $table->string('city');
            $table->string('region');
            $table->string('postal_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('timezone');
            $table->string('user_agent');
            $table->string('platform');
            $table->string('browser');
            $table->string('device');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_viewers');
    }
};
