<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $table = 'contents';
    protected $fillable = [

'topic_id',
'teacher_id',
'type_id',
'image_notes',
'video_notes',
'video_url',
];
}
