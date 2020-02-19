<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title', 'path', 'owner_id', 'album_id'
    ];

    public function album()
    {
    return $this->hasOne(Album::class);
    }


}
