<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['logo', 'banner', 'about_image1', 'about_image2', 'slider_image1', 'slider_image2', 'slider_image3'];

    /**
     * Always returns the single settings row, creating it if it doesn't exist.
     */
    public static function instance(): static
    {
        return static::firstOrCreate([]);
    }
}
