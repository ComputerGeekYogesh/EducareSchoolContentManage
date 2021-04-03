<?php

namespace App\Http\Controllers\TeacherPanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Classes;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function index(){
        $chapter = Chapter::where('status','!=','2')->get();
       return view ('Teacherpanel.collection.chapter.index')->with('chapter',$chapter);


}
public function viewpage(){
$subject = Subject::get();         //where('status','!=','3')->get();     //* 3-> Deleted Data
return view ('Teacherpanel.collection.chapter.create')->with('subject',$subject);
}

public function store(Request $request){
$chapter = new Chapter();
$chapter->subject_id = $request->input('subject_id');
$chapter->chapter_no = $request->input('chapter_no');
$chapter->chapter_name = $request->input('chapter_name');
$chapter->save();
return redirect()->back()->with('status','Chapter Added Successfully');
}


public function edit ($id){
   $subject = Subject::get();
   $chapter = Chapter::find($id);
   return view('Teacherpanel.collection.chapter.edit')->with('chapter',$chapter)->with('subject',$subject);
}

public function update(Request $request, $id) {
   $chapter = Chapter::find($id);
   $chapter->subject_id = $request->input('subject_id');
   $chapter->chapter_no = $request->input('chapter_no');
   $chapter->chapter_name = $request->input('chapter_name');
   $chapter->update();
    return redirect()->back()->with('status','Chapter Updated Successfully');
}

   public function delete($id) {
   $chapter = Chapter::find($id);
   $chapter-> status = "2"; //* 2->SoftDelete
   $chapter->update();
   return redirect()->back()->with('status','Dont Worry! You Can Re-store the Deleted Chapter');

}
public function deletedrecords(){
$chapter = Chapter::where('status','2')->get();
return view ('Teacherpanel.collection.chapter.deleted')->with('chapter',$chapter);

}
public function deletedrestore($id) {
$chapter = Chapter::find($id);
$chapter-> status = "0"; //* 2->SoftDelete
$chapter->update();
return redirect()->back()->with('status','Chapter Restored Successfully');

}
public function permanentdelete($id) {
    $chapter = Chapter::find($id);
    $chapter->delete();
    return redirect()->back()->with('status','Chapter Permanently Deleted ');

    }
}
