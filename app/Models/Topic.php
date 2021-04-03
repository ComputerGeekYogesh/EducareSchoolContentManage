<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    public function chapters()
    {
        return $this->belongsTo('App\Models\Chapter', 'chapter_id'  ,'id');
    }
}
