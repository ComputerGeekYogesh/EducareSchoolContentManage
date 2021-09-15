<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public function subjects()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id'  ,'id');
    }
}
