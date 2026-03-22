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
            // Why Choose Us
            $table->string('why_image')->nullable()->after('slider_text3');
            $table->text('why_desc1')->nullable();
            $table->text('why_desc2')->nullable();
            $table->string('why_feature1_title')->nullable();
            $table->text('why_feature1_desc')->nullable();
            $table->string('why_feature2_title')->nullable();
            $table->text('why_feature2_desc')->nullable();
            $table->string('why_feature3_title')->nullable();
            $table->text('why_feature3_desc')->nullable();
            // Spice Processing
            $table->string('process1_title')->nullable();
            $table->text('process1_desc')->nullable();
            $table->string('process2_title')->nullable();
            $table->text('process2_desc')->nullable();
            $table->string('process3_title')->nullable();
            $table->text('process3_desc')->nullable();
            $table->string('process4_title')->nullable();
            $table->text('process4_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'why_image','why_desc1','why_desc2',
                'why_feature1_title','why_feature1_desc',
                'why_feature2_title','why_feature2_desc',
                'why_feature3_title','why_feature3_desc',
                'process1_title','process1_desc',
                'process2_title','process2_desc',
                'process3_title','process3_desc',
                'process4_title','process4_desc',
            ]);
        });
    }
};
