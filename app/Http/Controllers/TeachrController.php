<?php

namespace App\Http\Controllers;
use App\Models\teacher;
use App\Models\Content;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Classes;
use App\Models\ClassTeacher;
use App\Models\ClassSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class TeachrController extends Controller
{
    public function getprofile(){
        $id = Auth::id();
        $getprofile = teacher::where('user_id','=',$id)->get();
        return ["code"=>200,"data"=>$getprofile,"status"=>"success"];
       }

public function profileupdate(Request $request){
        $id = Auth::id();
        $update = teacher::where('user_id','=',$id)->first();

       if ($request->hasfile('image' ) && $request->image != null )
      {
          $file = $request->file('image');
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          if($extension == "jpg" || $extension == "jpeg" || $extension == "png")
          {
            $file->storeAs("public/",$filename);
            $update->image = $filename;
        //    $file->move ('uploads\teacher_pro_uploads\teacher_image',$filename);
        //    $update->image= url('uploads\teacher_pro_uploads\teacher_image', $filename);
          // $update->save();
          }
          else
          {
               return response()->json(["status"=>"failure","code"=> 422,"message"=> "image must be in .jpg, .jpeg, .png format"]);
          }

      }

      if ($request->has('mobile_no') && $request->mobile_no != null)
      {
       $update->mobile_no = $request->mobile_no;
      // $result = $update->save();
      }

      if ($request->has('gender_id') && $request->gender_id != null)
      {
       $update->gender_id = $request->gender_id;
      // $result = $update->save();
      }

      if($request->has('date_of_birth') && $request->date_of_birth != null)
      {
       $update->date_of_birth = $request->date_of_birth;
      // $result = $update->save();
      }

      if ($request->has('current_address') && $request->current_address != null)
      {
       $update->current_address = $request->current_address;
      // $result = $update->save();
      }

      if ($request->has('permanent_address') && $request->permanent_address != null)
      {
       $update->permanent_address = $request->permanent_address;
      // $result = $update->save();

      }

      if ($request->has('father_name') && $request->father_name != null)
      {
       $update->father_name = $request->father_name;
      // $result = $update->save();
      }

      if ($request->has('mother_name') && $request->mother_name != null)
      {
       $update->mother_name = $request->mother_name;
      // $result = $update->save();
      }

      if ($request->has('marital_status') && $request->marital_status != null)
      {
       $update->marital_status = $request->marital_status;
      // $result = $update->save();
      }

      if ($request->hasfile('identity_doc') )
      {
          $file = $request->file('identity_doc');
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          if($extension == "pdf")
          {
            $file->storeAs("public/",$filename);
            $update->identity_doc = $filename;
        //    $file->move ('uploads\teacher_pro_uploads\teacher_docs',$filename);
        //   $update->identity_doc = url('uploads\teacher_pro_uploads\teacher_docs',$filename);
         // $result = $update->save();
          }
          else
          {
               return response()->json(["status"=>"failure","code"=> 422,"message"=> "identity doc must be in .pdf format"]);
          }

      }

      if ($request->hasfile('qualification_doc'))
      {

          $file = $request->file('qualification_doc');
          $filename = $file->getClientOriginalName();
          $extension = $file->getClientOriginalExtension();
          if($extension == "pdf")
          {
            $file->storeAs("public/",$filename);
            $update->qualification_doc = $filename;
        //    $file->move ('uploads\teacher_pro_uploads\teacher_docs',$filename);
        //    $update->qualification_doc = url('uploads\teacher_pro_uploads\teacher_docs',$filename);
           //$result = $update->save();
          }
          else
          {
               return response()->json(["status"=>"failure","code"=> 422,"message"=> "qualification doc must be in .pdf format"]);
          }
      }

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

public function contentupload(Request $request){
       $upload = new Content();
       $upload->topic_id = $request->topic_id;
       $upload->teacher_id = $request->teacher_id;

       if ($request->hasfile('image_notes'))
       {
           $file = $request->file('image_notes');
           $filename = $file->getClientOriginalName();
           $extension = $file->getClientOriginalExtension();
           if( $extension == "jpg" || $extension == "jpeg" || $extension == "png")
           {
               //$file->move('uploads\content_uploads\image_notes',$filename);
               $file->storeAs("public/",$filename);
               $upload->image_notes = $filename;

              // $upload->image_notes = url('uploads\content_uploads\image_notes',$filename);
              // $result = $upload->save();
           }
           else
           {
                return response()->json(["status"=>"failure","code"=> 422,"message"=> "image notes must be in .jpg, .jpeg, .png format"]);
           }

       }

       if ($request->hasfile('video_notes'))
       {
           $file = $request->file('video_notes');
           $filename = $file->getClientOriginalName();
           $extension = $file->getClientOriginalExtension();
           if($extension == "pdf")
           {
              // $file->move('uploads\content_uploads\video_notes',$filename);
              $file->storeAs("public/",$filename);
              $upload->video_notes =$filename;
              // $upload->video_notes = url('uploads\content_uploads\video_notes',$filename);
              // $result = $upload->save();
           }
           else
           {
                return response()->json(["status"=>"failure","code"=> 422,"message"=> "video notes must be in .pdf format"]);
           }

       }

       if ($request->hasfile('video_url'))
       {
           $file = $request->file('video_url');
           $filename = $file->getClientOriginalName();
           $extension = $file->getClientOriginalExtension();
           if($extension == "mp4")
           {
              // $file->move('uploads\content_uploads\video_url',$filename);
              $file->storeAs("public/",$filename);
              $upload->video_url = $filename;
              // $upload->video_url = url('uploads\content_uploads\video_url',$filename);
               //$result = $upload->save();
           }
           else
           {
                return response()->json(["status"=>"failure","code"=> 422,"message"=> "video must be in .mp4 format"]);
           }

       }

       $result = $upload->save();

       if($result)
       {
           return ["message" => "Content uploaded","code"=>200,"data"=>$upload,"status"=>"success"];
       }
       else{
           return ["message" => "Content not uploaded","code"=>404,"status"=>"failure"];
       }

}

}
