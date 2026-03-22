<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            // Why Choose Us — feature card images
            $table->string('why_feature1_image')->nullable()->after('why_feature1_desc');
            $table->string('why_feature2_image')->nullable()->after('why_feature2_desc');
            $table->string('why_feature3_image')->nullable()->after('why_feature3_desc');
            // Spice Processing — step images
            $table->string('process1_image')->nullable()->after('process1_desc');
            $table->string('process2_image')->nullable()->after('process2_desc');
            $table->string('process3_image')->nullable()->after('process3_desc');
            $table->string('process4_image')->nullable()->after('process4_desc');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'why_feature1_image', 'why_feature2_image', 'why_feature3_image',
                'process1_image', 'process2_image', 'process3_image', 'process4_image',
            ]);
        });
    }
};
