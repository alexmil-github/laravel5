<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title'
    ];

    public function photos() {
        return $this->hasMany(Photo::class, 'owner_id');
    }
}
