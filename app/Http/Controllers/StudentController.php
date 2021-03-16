<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Classes;
use App\Models\ClassSubject;
use App\Models\subject;
use App\Models\Chapter;
use App\Models\Topic;


use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function class()
    {
     $class = Classes::all('id','class');
     return ["code"=>200," class"=>$class,"status"=>"success"]; 
    }

    public function subject()
    {
     $subject_id = ClassSubject::all('id','class_id','subject_id');
     return ["code"=>200," subject"=>$subject_id,"status"=>"success"];
    }

    public function chapter()
    {
     $chapter_no = Chapter::all('id','subject_id','chapter_no');
     return ["code"=>200," chapter no"=>$chapter_no,"status"=>"success"];
    }

    public function topic()
    {
     $topic_name = Topic::all('id','chapter_id','topic_name');
     return ["code"=>200," topic name"=>$topic_name,"status"=>"success"];
    }

    public function video()
    {

     $video = Video::all('id','topic_id','video_url');
     return ["code"=>200,"video"=>$video,"status"=>"success"];
    }
}
