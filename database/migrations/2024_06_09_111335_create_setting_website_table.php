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
        Schema::create('setting_website', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('favicon');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('about')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('return_policy')->nullable();
            $table->text('refund_policy')->nullable();
            $table->text('shipping_policy')->nullable();
            $table->text('payment_policy')->nullable();
            $table->text('cancellation_policy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_website');
    }
};
