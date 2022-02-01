<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Administrator']);
    }

    public function index(){
        $roles = Role::all();
        $permissions = Permission::all();

        return view('dashboard.roles.roles&permissions',compact(['roles','permissions',]));
    }//end of index



    //this method create new permission
    public function CreatePermission(Request $request){
        $permission = $request->permission;
        Permission::create(['name'=>$permission]);
        return redirect()->back()->with('status','Permission Added Successfully');
    }//end of create permission



    public function CreateRole(Request $request){
       $role = $request->role;
       $permission = $request->permissions;

       $role_created = Role::create(['name'=>$role]);
       $role_created->syncPermissions($permission);
       return redirect()->back()->with('status','Role Created successfully');
    }



}//end of roles and permissions
