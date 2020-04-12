<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    protected $fillable = [
        'name'
    ];

    public function resume()
    {
        return $this->hasMany(Resume::class);
    }
}
