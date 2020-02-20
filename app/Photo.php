<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'title', 'path', 'description', 'owner_id', 'album_id'
    ];


}
