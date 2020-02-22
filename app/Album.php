<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title', 'is_public'
    ];

    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
