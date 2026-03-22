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
        Schema::table('site_settings', function (Blueprint $table) {
            $table->text('slider_text1')->nullable()->change();
            $table->text('slider_text2')->nullable()->change();
            $table->text('slider_text3')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('slider_text1')->nullable()->change();
            $table->string('slider_text2')->nullable()->change();
            $table->string('slider_text3')->nullable()->change();
        });
    }
};
