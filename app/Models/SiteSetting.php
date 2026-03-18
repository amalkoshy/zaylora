<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['logo', 'banner'];

    /**
     * Always returns the single settings row, creating it if it doesn't exist.
     */
    public static function instance(): static
    {
        return static::firstOrCreate([]);
    }
}
