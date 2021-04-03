<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
class RegisteredController extends Controller
{
    public function index(Request $request)
    {
        // $users = User::paginate(2);  custom pagination
        // $users = User::all();
        $users = User::where([['role_id', $request->input('roles')],['status','!=','2']])->get();

         return view('AdminPanel.users.index')->with('users',$users);
    }
    public function edit($id)
    {   $role = new Role();
        $user = User::find($id);
        return view ('AdminPanel.users.edit')->with('user',$user)->with('role',$role);
    }
    public function updaterole (Request $request , $id)
    {
        $user = User::find($id);
        $user->name= $request->input('name');
        $user->role_id= $request->input('roles');
        $user->deactivate= $request->input('deactivate');
        $user->update();

        return redirect()->back()->with('status','Role is Updated');
    }
    public function delete($id) {
        $user = User::find($id);
        $user-> status = "2"; //* 2->SoftDelete
        $user->update();
        return redirect()->back()->with('status','Dont Worry! You Can Re-store the Deleted User');

     }
     public function deletedrecords(){
     $user = User::where('status','2')->get();
     return view ('AdminPanel.users.deleted')->with('user',$user);

     }
     public function deletedrestore($id) {
     $user = User::find($id);
     $user-> status = "0"; //* 2->SoftDelete
     $user->update();
     return redirect()->back()->with('status','User Restored Successfully');

     }
     public function permanentdelete($id) {
         $user = User::find($id);
         $user->delete();
         return redirect()->back()->with('status','User Permanently Deleted ');

         }
}
