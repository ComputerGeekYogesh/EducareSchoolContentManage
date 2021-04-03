<?php

namespace App\Http\Controllers\TeacherPanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Classes;
use App\Models\Chapter;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index(){
        $topic = Topic::where('status','!=','2')->get();
       return view ('Teacherpanel.collection.topic.index')->with('topic',$topic);


}
public function viewpage(){
$chapter = Chapter::get();         //where('status','!=','3')->get();     //* 3-> Deleted Data
return view ('Teacherpanel.collection.topic.create')->with('chapter',$chapter);
}

public function store(Request $request){
$topic = new Topic();
$topic->chapter_id = $request->input('chapter_id');
$topic->topic_name = $request->input('topic_name');
$topic->save();
return redirect()->back()->with('status','Topic Added Successfully');
}


public function edit ($id){
   $chapter = Chapter::get();
   $topic = Topic::find($id);
   return view('Teacherpanel.collection.topic.edit')->with('topic',$topic)->with('chapter',$chapter);
}

public function update(Request $request, $id) {
   $topic = Topic::find($id);
   $topic->chapter_id = $request->input('chapter_id');
   $topic->topic_name = $request->input('topic_name');
   $topic->update();
    return redirect()->back()->with('status','Topic Updated Successfully');
}

   public function delete($id) {
   $topic = Topic::find($id);
   $topic-> status = "2"; //* 2->SoftDelete
   $topic->update();
   return redirect()->back()->with('status','Dont Worry! You Can Re-store the Deleted Topic');

}
public function deletedrecords(){
$topic = Topic::where('status','2')->get();
return view ('Teacherpanel.collection.topic.deleted')->with('topic',$topic);

}
public function deletedrestore($id) {
$topic = Topic::find($id);
$topic-> status = "0"; //* 2->SoftDelete
$topic->update();
return redirect()->back()->with('status','Topic Restored Successfully');

}
public function permanentdelete($id) {
    $topic = Topic::find($id);
    $topic->delete();
    return redirect()->back()->with('status','Topic Permanently Deleted ');

    }
}
