<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Classes;
use App\Models\subject;
use App\Models\Chapter;
use App\Models\Topic;


use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function class()
    {
     $class = Classes::all('class');
     return ["code"=>200,"Select class"=>$class,"status"=>"success"];
    }

    public function subject()
    {
     $subject_name = Subject ::all('subject_name');
     return ["code"=>200,"Select subject"=>$subject_name,"status"=>"success"];
    }

    public function chapter()
    {
     $chapter_no = Chapter::all('chapter_no');
     return ["code"=>200,"Select chapter no"=>$chapter_no,"status"=>"success"];
    }

    public function topic()
    {
     $topic_name = Topic::all('topic_name');
     return ["code"=>200,"Select topic name"=>$topic_name,"status"=>"success"];
    }

    public function video()
    {

     $video = Video::all('video_url');
     return ["code"=>200,"video"=>$video,"status"=>"success"];
    }
}
