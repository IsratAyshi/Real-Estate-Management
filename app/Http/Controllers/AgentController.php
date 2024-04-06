<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AgentController extends Controller
{
    

    public function AgentDashboard(){

        return view('agent.index');
    }

    public function AgentLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/agent/login');
    }//end method

    public function AgentGoBack() {


        return view('frontend.index');

    } //end method

    public function AgentLogin() {


        return view('agent.agent_login');

    } //end method

    public function AgentProfile() {

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_profile_view',compact('profileData'));


    } //end method


    public function AgentProfileStore( Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address  = $request->address;
        
        $data->save();

        $notification = array(

            'message' => 'Agent Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//end method
}
