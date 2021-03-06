<?php

namespace App\Http\Controllers;
use App\Models\teacher;
use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class teacherController extends Controller
{
     public function profile(){
        return teacher::all();
     }

     public function profileupdate(Request $req){
                    $update = teacher::find($req->id);
                    $update->first_name = $req->first_name;
                    $update->last_name = $req->last_name;

                   if ($req->hasfile('image'))
                   {
                       $file = $req->file('image');
                       $filename = $file->getClientOriginalName();
                       $file->move ('uploads\teacher_pro_uploads\teacher_image',$filename);
                       $update->image= $filename;
                   }
                   $update->date_of_birth = $req->date_of_birth;
                   $update->mobile_no = $req->mobile_no;
                   $update->email = $req->email;
                   if ($req->hasfile('identity_doc'))
                   {
                       $file = $req->file('identity_doc');
                       $filename = $file->getClientOriginalName();
                       $file->move ('uploads\teacher_pro_uploads\teacher_docs',$filename);
                       $update->identity_doc = $filename;
                   }

                   if ($req->hasfile('qualification_doc'))
                   {
                       $file = $req->file('qualification_doc');
                       $filename = $file->getClientOriginalName();
                       $file->move ('uploads\teacher_pro_uploads\teacher_docs',$filename);
                       $update->qualification_doc = $filename;
                   }
                    $result = $update->save();
                    if($result)
                    {
                        return ["message" => "Profile updated ","code"=>200,"data"=>$update,"status"=>"success"];
                    }
                    else{
                        return ["message" => "Profile not updated","code"=>404,"status"=>"failure"];
                    }

     }

        public function videoupload(Request $req){
                    $upload = new video;
                    $upload->id = $req->id;
                    $upload->topic_id = $req->topic_id;
                    $upload->user_id = $req->user_id;

                    //  $result = $req->file('file')->store('uploads\content_uploads\image_notes');
                    // return ['result' =>$result];

                    // if ($req ->hasfile('image_notes'))
                    // {
                    //     $destination = 'uploads\content_uploads\image_notes'.$upload->image_notes;
                    // }


                    if ($req->hasfile('image_notes'))
                    {
                    // {
                    //     $destination = 'uploads\content_uploads\image_notes'.$upload->image_notes;
                    //     if (File::exists($destination)){
                    //         File::delete($destination);
                    //     }
                        $file = $req->file('image_notes');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.'. $extension;

                        $file->move ('uploads\content_uploads\image_notes',$filename);
                        $upload->image_notes = $filename;
                    }

                    // $filename = "test.jpg";
                    // if ($req ->hasfile('image_notes'))
                    // {
                    // $path = $req->file('image_notes')->move('uploads\content_uploads\image_notes',$filename);
                    // $upload->image_notes = $filename;
                    // //$photoURL = url('/',$filename);

                    if ($req->hasfile('video_notes'))
                    {
                        $file = $req->file('video_notes');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.'. $extension;
                        $file->move ('uploads\content_uploads\video_notes',$filename);
                        $upload->video_notes = $filename;
                    }

                    if ($req->hasfile('video_url'))
                    {
                        $file = $req->file('video_url');
                        $extension = $file->getClientOriginalExtension();
                        $filename = time() . '.'. $extension;
                        $file->move ('uploads\content_uploads\video_url',$filename);
                        $upload->video_url = $filename;
                    }

                    $result=$upload->save();
                    if($result)
                    {
                        return ["Result" => "Content uploaded successfully"];
                    }
                    else
                    {
                        return ["Result" => "Error while uploading video"];
                    }



     }
}

