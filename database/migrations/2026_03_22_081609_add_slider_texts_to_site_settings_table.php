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
            $table->string('slider_text1')->nullable()->after('slider_image1');
            $table->string('slider_text2')->nullable()->after('slider_image2');
            $table->string('slider_text3')->nullable()->after('slider_image3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['slider_text1', 'slider_text2', 'slider_text3']);
        });
    }
};
