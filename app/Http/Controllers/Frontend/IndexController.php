<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\PropertyType; 
use App\Models\PropertyService;
use App\Models\Facilities;
use App\Models\User; 
use App\Models\PackagePlan;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyMessage;  
use Carbon\Carbon;
use App\Models\State;

class IndexController extends Controller
{
    
    public function PropertyDetails($id,$slug){

        $property = Property::findOrFail($id);

        $facilities = $property->facility_id;
        $property_fac = explode(',',$facilities);


        $multiImage = MultiImage::where('property_id',$id)->get();
        $distance = PropertyService::where('property_id',$id)->get();

         
        return view('frontend.property.property_details',compact('property','multiImage','property_fac','distance' ));



    } //end method

    public function PropertyMessage(Request $request){

        $pid = $request->property_id;
        $aid = $request->agent_id;

        if (Auth::check()) {

        PropertyMessage::insert([

            'user_id' => Auth::user()->id,
            'agent_id' => $aid,
            'property_id' => $pid,
            'msg_name' => $request->msg_name,
            'msg_email' => $request->msg_email,
            'msg_phone' => $request->msg_phone,
            'message' => $request->message,
            'created_at' => Carbon::now(), 

        ]);

        $notification = array(
            'message' => 'Send Message Successful',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



        }
        else{

            $notification = array(
            'message' => 'Please Log In to Your Account',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
        }

    }// End Method

    public function RentProperty(){
        $property = Property::where('status','1')->where('property_status','rent')->get();
        return view('frontend.property.rent_property',compact('property'));
    }// End Method 

    public function BuyProperty(){
        $property = Property::where('status','1')->where('property_status','buy')->get();
        return view('frontend.property.buy_property',compact('property'));
    }// End Method 

    public function FeaturedProperty(){
        $property = Property::where('status','1')->where('featured','1')->get();
        return view('frontend.property.featured_property',compact('property'));
    }// End Method
    
    
    public function BuyPropertySeach(Request $request){

        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $stype = $request->ptype_id;

   $property = Property::where('property_name', 'like' , '%' .$item. '%')->where('property_status','buy')->with('type','pstate')
        ->whereHas('pstate', function($q) use ($sstate){
            $q->where('state_name','like' , '%' .$sstate. '%');
        })
        ->whereHas('type', function($q) use ($stype){
            $q->where('type_name','like' , '%' .$stype. '%');
         })
        ->get();

        return view('frontend.property.property_search',compact('property'));

    }// End Method

    public function RentPropertySeach(Request $request){

        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $stype = $request->ptype_id;

   $property = Property::where('property_name', 'like' , '%' .$item. '%')->where('property_status','rent')->with('type','pstate')
        ->whereHas('pstate', function($q) use ($sstate){
            $q->where('state_name','like' , '%' .$sstate. '%');
        })
        ->whereHas('type', function($q) use ($stype){
            $q->where('type_name','like' , '%' .$stype. '%');
         })
        ->get();

        return view('frontend.property.property_search',compact('property'));

    }// End Method

}






