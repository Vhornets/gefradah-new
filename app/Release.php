<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $fillable = [
        'title',
        'artist',
        'sort_order',
        'cover',
        'background',
        'soundcloud_playlist',
        'description',
        'download_links',
        'additional_links',
        'gallery',
    ];

    public function downloads() {
        return $this->hasMany(Download::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }
}
