<?php

namespace App\Http\Controllers\TeacherPanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classes;
use App\Models\classSubject;
class ClassesController extends Controller
{
    public function index(){
        $classes = classes::where('status','!=','2')->get();
       return view ('Teacherpanel.collection.classes.index')->with('classes',$classes);


}
public function viewpage(){
return view ('Teacherpanel.collection.classes.create');
}

public function store(Request $request){
$classes = new classes();
$classes->class_name = $request->input('class_name');
$classes->save();

return redirect()->back()->with('status','Class Added Successfully');
}


public function edit ($id){
   $classes = classes::find($id);
   return view('Teacherpanel.collection.classes.edit')->with('classes',$classes);
}

public function update(Request $request, $id) {
   $classes = classes::find($id);
   $classes->class_name = $request->input('class_name');
   $classes->update();
    return redirect()->back()->with('status','Class Updated Successfully');
}

   public function delete($id) {
   $classes = classes::find($id);
   $classes-> status = "2"; //* 2->SoftDelete
   $classes->update();
   return redirect()->back()->with('status','Dont Worry! You Can Re-store the Deleted Class');

}
public function deletedrecords(){
$classes = classes::where('status','2')->get();
return view ('Teacherpanel.collection.classes.deleted')->with('classes',$classes);

}
public function deletedrestore($id) {
$classes = classes::find($id);
$classes-> status = "0"; //* 2->SoftDelete
$classes->update();
return redirect()->back()->with('status','Class Restored Successfully');

}
public function permanentdelete($id) {
    $classes = classes::find($id);
    $classes->delete();
    return redirect()->back()->with('status','Class Permanently Deleted ');

    }
}
