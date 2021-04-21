<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'class_id ',
        'subject_name',
        'subject_code',
        'status',
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id'  ,'id');
    }
}
