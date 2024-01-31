<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use App\User;
class RoleController extends Controller
{
  // function __construct()
  //   {
  //       $this->middleware(['permission:role-edit','permission:role-delete']);
  //   }

    public function adminRole(){
      $roles = Role::get();
      return view('admin.role.index')->with(compact('roles'));
    }

    public function create(Request $request){
      if ($request->isMethod('post')) {
        $role=Role::create($request->except(['permission','_token']));
          foreach ($request->permission as $key=>$value){
              $role->attachPermission($value);
          }


        return redirect()->back()->with('flash_message_success','Roles add Successfully');
      }
      $permissions = Permission::get();
      return view('admin.role.create')->with(compact('permissions'));
    }

    public function roleEdit(Request $request, $id){
      if ($request->isMethod('post')) {
        $role=Role::find($id);
        $role->name=$request->name;
        $role->display_name=$request->display_name;
        $role->description=$request->description;
        $role->save();
        DB::table('permission_role')->where('role_id',$id)->delete();
        foreach ($request->permission as $key=>$value){
            $role->attachPermission($value);
        }
        return redirect()->back()->with('flash_message_success','Roles add Successfully');
      }
      $role=Role::find($id);
      $permissions=Permission::all();
      $role_permissions = $role->perms()->pluck('id','id')->toArray();
      return view('admin.role.edit')->with(compact('role','role_permissions','permissions'));
    }
    public function roleDelete($id){
        DB::table("roles")->where('id',$id)->delete();
        return back()->withMessage('Role Deleted');
    }
    public function viewUser(){
      $users = User::where('super_admin',"=",0)->get();
      $allRoles = Role::get();
      return view('admin.user')->with(compact('users','allRoles'));
    }

    public function update(Request $request, $id){

        $user=User::find($id);
        $roles=$request->roles;
        DB::table('role_user')->where('user_id',$id)->delete();
        foreach ($roles as $role){
            $user->attachRole($role);
        }
        return back()->withMessage('Updated');


    }
}
