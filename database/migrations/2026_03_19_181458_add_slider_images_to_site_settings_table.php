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
            $table->string('slider_image1')->nullable()->after('about_image2');
            $table->string('slider_image2')->nullable()->after('slider_image1');
            $table->string('slider_image3')->nullable()->after('slider_image2');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['slider_image1', 'slider_image2', 'slider_image3']);
        });
    }
};
