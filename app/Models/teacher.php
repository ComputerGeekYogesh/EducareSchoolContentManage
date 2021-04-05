<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'user_id ',
        'image',
        'mobile_no',
        'gender_id',
        'date_of_birth',
        'current_address',
        'permanent_address',
        'father_name',
        'mother_name',
        'marital_status',
        'identity_doc',
        'qualification_doc',];
}
