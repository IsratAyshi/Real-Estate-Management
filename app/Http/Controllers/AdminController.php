<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;




class AdminController extends Controller
{
    public function AdminDashboard(){
        
        return view('admin.index');
    } //end method


    public function AdminLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//end method

    public function AdminGoBack() {


        return view('frontend.index');

    } //end method

    public function AdminLogin() {


        return view('admin.admin_login');

    } //end method

    public function AdminProfile() {

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));


    } //end method


    public function AdminProfileStore( Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address  = $request->address;
        
        $data->save();

        $notification = array(

            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//end method

    public function AdminAllAgent() {

        $allagent= User::where('role','agent')->get();
        return view('admin.admin_all_agent',compact('allagent'));


    } //end method

    public function AdminAddAgent() {

        return view('admin.admin_add_agent');


    } //end method

    public function addagent(Request $request)
    {
        $data= new user;
        $data->name= $request->name;
        $data->email= $request->email;
        $data->password= bcrypt($request->password);
        $data->role='agent';

        $data->save();

        return redirect()->back();
    }


}
