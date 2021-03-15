<?php

namespace App\Http\Controllers;
use App\Models\teacher;
use App\Models\Video;
use App\Models\Classes;
use App\Models\ClassTeacher;
use App\Models\ClassSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class TeacherController extends Controller
{
     public function getprofile(Request $request){
                     $update = teacher::find($request->id)->first();
                     return ["code"=>200,"data"=>$update,"status"=>"success"];
                    }

     public function profileupdate(Request $request){
                    $update = teacher::find($request->id);

                    if ($request->hasfile('image' ) && $request->image != null)
                   {
                       $file = $request->file('image');
                       $filename = $file->getClientOriginalName();
                       $file->move ('uploads\teacher_pro_uploads\teacher_image',$filename);
                       $update->image= $filename;
                       $result = $update->save();
                   }

                   elseif ($request->has('mobile_no') && $request->mobile_no != null)
                   {
                    $update->mobile_no = $request->mobile_no;
                    $result = $update->save();
                   }

                   elseif ($request->has('gender_id') && $request->gender_id != null)
                   {
                    $update->gender_id = $request->gender_id;
                    $result = $update->save();
                   }

                   elseif($request->has('date_of_birth') && $request->date_of_birth != null)
                   {
                    $update->date_of_birth = $request->date_of_birth;
                    $result = $update->save();
                   }

                   elseif ($request->has('current_address') && $request->current_address != null)
                   {
                    $update->current_address = $request->current_address;
                    $result = $update->save();
                   }

                   elseif ($request->has('permanent_address') && $request->permanent_address != null)
                   {
                    $update->permanent_address = $request->permanent_address;
                    $result = $update->save();

                   }

                   elseif ($request->has('father_name') && $request->father_name != null)
                   {
                    $update->father_name = $request->father_name;
                    $result = $update->save();
                   }

                   elseif ($request->has('mother_name') && $request->mother_name != null)
                   {
                    $update->mother_name = $request->mother_name;
                    $result = $update->save();
                   }

                   elseif ($request->has('marital_status') && $request->marital_status != null)
                   {
                    $update->marital_status = $request->marital_status;
                    $result = $update->save();
                   }

                   elseif ($request->hasfile('identity_doc') )
                   {
                       $file = $request->file('identity_doc');
                       $filename = $file->getClientOriginalName();
                       $file->move ('uploads\teacher_pro_uploads\teacher_docs',$filename);
                       $update->identity_doc = $filename;
                       $result = $update->save();
                   }

                   elseif ($request->hasfile('qualification_doc'))
                   {
                       $file = $request->file('qualification_doc');
                       $filename = $file->getClientOriginalName();
                       $file->move ('uploads\teacher_pro_uploads\teacher_docs',$filename);
                       $update->qualification_doc = $filename;
                       $result = $update->save();
                   }

                   else
                   {
                    return ["message" => "Enter Field does not exist","code"=>404,"status"=>"failure"];
                   }

                    if($result)
                    {
                        return ["message" => "Profile updated ","code"=>200,"data"=>$update,"status"=>"success"];
                    }
                    else{
                        return ["message" => "Profile not updated","code"=>404,"status"=>"failure"];
                    }

     }

        public function videoupload(Request $request){
                    $upload = new Video;
                    $upload->topic_id = $request->topic_id;
                    $upload->teacher_id = $request->teacher_id;
                    return
                ($upload);
                    // if ($request->hasfile('image_notes'))
                    // {
                    //     $file = $request->file('image_notes');
                    //     $filename = $file->getClientOriginalName();
                    //     $file->move('uploads\content_uploads\image_notes',$filename);
                    //     $upload->image_notes = url('uploads\content_uploads\image_notes',$filename);
                    // }

                    // if ($request->hasfile('video_notes'))
                    // {
                    //     $file = $request->file('video_notes');
                    //     $filename = $file->getClientOriginalName();
                    //     $file->move('uploads\content_uploads\video_notes',$filename);
                    //     $upload->video_notes = url('uploads\content_uploads\video_notes',$filename);
                    // }

                    // if ($request->hasfile('video_url'))
                    // {
                    //     $file = $request->file('video_url');
                    //     $filename = $file->getClientOriginalName();
                    //     $file->move('uploads\content_uploads\video_url',$filename);
                    //     $upload->video_url = url('uploads\content_uploads\video_url',$filename);
                    // }

                    // $result=$upload->save();
                    // if($result)
                    // {
                    //     return ["message" => "Content uploaded","code"=>200,"data"=>$upload,"status"=>"success"];
                    // }
                    // else{
                    //     return ["message" => "Content not uploaded","code"=>404,"status"=>"failure"];
                    // }

     }




        // public function subassign(Request $request)
        // {
        //             $clsassign = new ClassTeacher;
        //             $clsassign->class_id = $request->class_id;
        //             $clsassign->teacher_id = $request->teacher_id;
        //             $clsassign->save();

        //             $subassign = new ClassSubject;
        //             $subassign->class_id = $request->class_id;
        //             $subassign->subject_id = $request->subject_id;
        //             $result = $subassign->save();
        //             if($result)
        //             {
        //                 return ["message" => "Subject assigned","code"=>200,"data"=>$subassign,"status"=>"success"];
        //             }
        //             else{
        //                 return ["message" => "subject not assigned","code"=>404,"status"=>"failure"];
        //             }

        // }
}

