<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;
use App\Models\ClassSubject;
use App\Models\subject;
use App\Models\Chapter;
use App\Models\Topic;
use App\Models\Student;
use App\Models\Content;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentprofileupdate(Request $request){
        $id = Auth::id();
        $update = Student::where('user_id','=',$id)->first('id');
        $id = $update;
        $update = Student::find($id)->first();
        $update->class_id = $request->class_id;
         $update->mobile_no =  $request->mobile_no;
         $update->gender_id	 =  $request->gender_id;
        $update->date_of_birth =  $request->date_of_birth;
        $result = $update->save();
    if($result)
    {
        return ["message" => "Profile updated ","code"=>200,"data"=>$update,"status"=>"success"];
    }
    else
    {
        return ["message" => "Profile not updated","code"=>404,"status"=>"failure"];
    }
    }

    public function subject()
    {

        if (Auth::user())
        {
            $id = Auth::id();
            $class_id = DB::table('students')->where('user_id',$id)->value('class_id');
            $id = DB::table('subjects')->where('class_id',$class_id)->pluck('id');
            $subject_name = DB::table('subjects')->whereIn('id',$id)->pluck('subject_name');
            return ["code"=>200," subject"=>$subject_name,"status"=>"success"];
        }
    }

    public function chapter(Request $request)
    {
        if (Auth::user())
        {
            $chapter_no = DB::table('chapters')->where('subject_id',$request->subject_id)->pluck('chapter_no');
            return ["code"=>200," chapter_no"=>$chapter_no,"status"=>"success"];
        }
    }

    public function topic(Request $request)
    {
        if (Auth::user())
        {


            $topic_name = DB::table('topics')->where('chapter_id',$request->chapter_id)->pluck('topic_name');
            return ["code"=>200,"topic_name"=>$topic_name,"status"=>"success"];

         }
         }

    public function contentview(Request $request)
    {
        if (Auth::user())
    {
        $content = DB::table('contents')->select('image_notes','video_notes','video_url')->where('topic_id',$request->topic_id)->get();
        return ["code"=>200,"content"=>$content,"status"=>"success"];
    }
}
}
