<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeTagMapping extends Model
{
    protected $fillable = [
        'resume_id',
        'tag_id'
    ];
}
