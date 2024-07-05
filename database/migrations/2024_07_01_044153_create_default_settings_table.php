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
        Schema::create('default_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_timezone')->nullable();
            $table->string('site_currency')->nullable();
            $table->string('site_currency_symbol')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('site_main_email')->nullable();
            $table->string('site_support_email')->nullable();
            $table->string('site_main_phone')->nullable();
            $table->string('site_support_phone')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_facebook')->nullable();
            $table->string('site_twitter')->nullable();
            $table->string('site_instagram')->nullable();
            $table->string('site_linkedin')->nullable();
            $table->string('site_pinterest')->nullable();
            $table->string('site_youtube')->nullable();
            $table->string('site_whatsapp')->nullable();
            $table->string('site_telegram')->nullable();
            $table->string('site_tiktok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('default_settings');
    }
};
