<?php

namespace App\Http\Controllers\TeacherPanel;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\ClassSubject;
use App\Models\Classes;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subject = Subject::where('status','!=','2')->get();
       return view ('Teacherpanel.collection.subject.index')->with('subject',$subject);


}
public function viewpage(){
$classes = Classes::get();         //where('status','!=','3')->get();     //* 3-> Deleted Data
return view ('Teacherpanel.collection.subject.create')->with('classes',$classes);
}

public function store(Request $request){
$subject = new Subject();
$subject->class_id = $request->input('class_id');
$subject->subject_name = $request->input('subject_name');
$subject->subject_code = $request->input('subject_code');
$subject->save();
return redirect()->back()->with('status','Subject Added Successfully');
}


public function edit ($id){
   $classes = Classes::get();
   $subject = Subject::find($id);
   return view('Teacherpanel.collection.subject.edit')->with('subject',$subject)->with('classes',$classes);
}

public function update(Request $request, $id) {
   $subject = Subject::find($id);
   $subject->class_id = $request->input('class_id');
   $subject->subject_name = $request->input('subject_name');
   $subject->subject_code = $request->input('subject_code');
   $subject->update();
    return redirect()->back()->with('status','Class Updated Successfully');
}

   public function delete($id) {
   $subject = Subject::find($id);
   $subject-> status = "2"; //* 2->SoftDelete
   $subject->update();
   return redirect()->back()->with('status','Dont Worry! You Can Re-store the Deleted Subject');

}
public function deletedrecords(){
$subject = Subject::where('status','2')->get();
return view ('Teacherpanel.collection.subject.deleted')->with('subject',$subject);

}
public function deletedrestore($id) {
$subject = Subject::find($id);
$subject-> status = "0"; //* 2->SoftDelete
$subject->update();
return redirect()->back()->with('status','Subject Restored Successfully');

}
public function permanentdelete($id) {
    $subject = Subject::find($id);
    $subject->delete();
    return redirect()->back()->with('status','Subject Permanently Deleted ');

    }
}
