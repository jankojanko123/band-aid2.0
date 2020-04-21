<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'text',
        'apple_music',
        'spotify_id',
        'youtube_id',
        'band_camp_id',
        'soundcloud_id',
        'webpage',
        'text',
        'webpage'
    ];
}
