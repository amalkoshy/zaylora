<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'logo', 'banner',
        'about_image1', 'about_image2',
        'slider_image1', 'slider_image2', 'slider_image3',
        'slider_text1',  'slider_text2',  'slider_text3',
        // Why Choose Us
        'why_image',
        'why_desc1', 'why_desc2',
        'why_feature1_title', 'why_feature1_desc', 'why_feature1_image',
        'why_feature2_title', 'why_feature2_desc', 'why_feature2_image',
        'why_feature3_title', 'why_feature3_desc', 'why_feature3_image',
        // Spice Processing
        'process1_title', 'process1_desc', 'process1_image',
        'process2_title', 'process2_desc', 'process2_image',
        'process3_title', 'process3_desc', 'process3_image',
        'process4_title', 'process4_desc', 'process4_image',
    ];

    /**
     * Always returns the single settings row, creating it if it doesn't exist.
     */
    public static function instance(): static
    {
        return static::firstOrCreate([]);
    }
}
