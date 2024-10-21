<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    } // end function

    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    } // end function

    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name'      => $request->name,
            'group_name'=> $request->group_name
        ]);

        $notification = array(
            'message'   => 'Permission created successfully',
            'alert-type'=> 'success'
        );

        return redirect()->route('all.permission')->with($notification);
        
    } // end function

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
        
    } // end function

    public function UpdatePermission(Request $request)
    {
        $per_id = $request->id;
        Permission::findOrFail($per_id)->update([
            'name'      => $request->name,
            'group_name'=> $request->group_name
        ]);

        $notification = array(
            'message'   => 'Permission updated successfully',
            'alert-type'=> 'success'
        );

        return redirect()->route('all.permission')->with($notification);
        
    } // end function

    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message'   => 'Permission deleted successfully',
            'alert-type'=> 'success'
        );

        return redirect()->back()->with($notification);
    } // end function

    public function ImportPermission()
    {
        return view('backend.pages.permission.import_permission');
    } // end function

    public function Export()
    {
        return Excel::download(new permissionExport, 'permission.xlsx');
    } // end function

    public function Import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message'   => 'Permission imported successfully',
            'alert-type'=> 'success'
        );

        return redirect()->back()->with($notification);
    } // end function

    /*Role All Method*/
    public function AllRoles()
    {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    } // end function

    public function AddRoles()
    {
        return view('backend.pages.roles.add_roles');
    } // end function

    public function StoreRoles(Request $request)
    {
        Role::create([
            'name'      => $request->name,
        ]);

        $notification = array(
            'message'   => 'Roles created successfully',
            'alert-type'=> 'success'
        );

        return redirect()->route('all.roles')->with($notification);
        
    } // end function

    public function EditRoles($id)
    {
        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles', compact('roles'));
    } // end function

    public function UpdateRoles(Request $request)
    {
        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name'      => $request->name,
        ]);

        $notification = array(
            'message'   => 'Role updated successfully',
            'alert-type'=> 'success'
        );

        return redirect()->route('all.roles')->with($notification);
        
    } // end function

    public function DeleteRoles($id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
            'message'   => 'Role deleted successfully',
            'alert-type'=> 'success'
        );

        return redirect()->back()->with($notification);
    } // end function

    /*ADD ROLL PERMISSION ALL METHODS*/
    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroup();
        return view('backend.pages.rolesetup.add_roles_permission', compact('roles','permissions','permission_groups'));
    } // end function

    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }//end foreach

        $notification = array(
            'message'   => 'Role Permission added successfully',
            'alert-type'=> 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    } // end function

    public function AllRolesPermission()
    {
        $roles = Role::all();

        return view('backend.pages.rolesetup.all_roles_permission',compact('roles'));
    } // end function

    public function AdminEditRoles($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroup();
        return view('backend.pages.rolesetup.edit_roles_permission', compact('role','permissions','permission_groups'));
    } // end function

    public function AdminRolesUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message'   => 'Role Permission updated successfully',
            'alert-type'=> 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);

    } // end function

    public function AdminDeleteRoles($id)
    {
        $role = Role::findOrFail($id);

        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message'   => 'Role Permission deletd successfully',
            'alert-type'=> 'success'
        );

        return redirect()->back()->with($notification);

    } // end function
}
