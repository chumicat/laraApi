<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeTag extends Model
{
    protected $table = 'resume_tag';
    protected $fillable = [
        'resume_id',
        'tag_id'
    ];
}
