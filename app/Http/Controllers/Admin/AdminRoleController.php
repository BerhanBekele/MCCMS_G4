<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminRoleController extends Controller
{
    //
    public function index(){
        $viewData=[];
        $viewData["title"] = "Admin Page -Role-  ";
        $viewData["users"] = User::with('role')->get();
        return view('admin.role.index')->with("viewData",$viewData);

    }
    // public function create(){
    //     $viewData=[];
    //     $viewData["title"] = "Admin - Product - Online Store";
    //     return view('admin.role.create')->with("viewData",$viewData);
    // }
    public function delete($id){
        User::destroy($id);
        return back()->with('success','Succees Deletion!');

}
public function edit($id){
    $viewData=[];
    $viewData["title"] = "Admin Page -Role-  ";
    $viewData["user"] = User::with('role')->findOrFail($id);
    $viewData["roles"] = Role::all();
    return view('admin.role.edit')->with("viewData",$viewData);
}
public function update(Request $request,$id){
    // User::validate($request);
    $user=User::findOrFail($id);
    $user->name=$request->input('name');
    $user->email=$request->input('email');
    $user->role_id=$request->input('role');
   // $user->balance=$request->input('balance');
    $user->save();
        return redirect()->route('admin.role.index');

    }
}
