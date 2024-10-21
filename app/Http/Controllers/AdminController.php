<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }// end function

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login'); //default redirection to login page
    }// end function

    public function AdminLogin()
    {
        return view('admin.admin_login'); //default redirection to admin login page
    }// end function

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }// end function

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName(); 
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message'       => 'Admin profile updated successfully',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);
    }// end function

    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }// end function

    public function AdminUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'old_password'             =>'required',
            'new_password'             =>'required|confirmed|min:4'
        ]);

        // Matching the old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message'   => 'The old password does not match!',
                'alert-type'=> 'error'
            );
            return back()->with($notification);
        }

        // Update the new password
        User::whereId(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);

        $notification = array(
            'message'   => 'The password changed successfully!',
            'alert-type'=> 'success'
        );
        return back()->with($notification);
    }// end function

/*ADMIN USER ALL*/

    public function AllAdmin()
    {
        $alladmin = User::where('role','admin')->get();
        return view('backend.pages.admin.all_admin', compact('alladmin'));
    }// end function

    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));
    }// end function

    public function StoreAdmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->address = $request->address;
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

         $notification = array(
            'message'   => 'A new Admin User inserted successfully!',
            'alert-type'=> 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }// end function

    public function EditAdmin($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('user','roles'));
    }// end function

    public function UpdateAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->address = $request->address;
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

         $notification = array(
            'message'   => 'A new Admin User updated successfully!',
            'alert-type'=> 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }// end function

    public function DeleteAdmin($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }
        $notification = array(
            'message'   => 'Admin User deleted successfully!',
            'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
    }// end function

    public function SomeAction()
    {
        if (!auth()->user()->can('some_permission')) {
            abort(403, 'Unauthorized action');
        }
    }// end function
}
