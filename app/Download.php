<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'title',
        'href',
    ];

    public function release() {
        return $this->belongsTo(Release::class);
    }
}
