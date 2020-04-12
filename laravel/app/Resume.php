<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'name_id',
        'resume'
    ];

    public function name()
    {
        return $this->belongsTo(Name::class);
    }
    
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
