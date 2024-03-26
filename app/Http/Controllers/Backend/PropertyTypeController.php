<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Facilities;

class PropertyTypeController extends Controller
{
    public function AllType(){

        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));

    } //End method

    public function AddType(){

        
        return view('backend.type.add_type');

    } //End method

    public function StoreType(Request $request){

        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon


        ]);

        $notification = array(

            'message' => ' New Property Type Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
        

    } //End method

    public function EditType($id){

        
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));

    } //End method


    public function UpdateType(Request $request){

        $pid=$request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon


        ]);

        $notification = array(

            'message' => ' Property Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
        

    } //End method

    public function DeleteType($id){

        
        PropertyType::findOrFail($id)->delete();
    
        $notification = array(

            'message' => ' Property Type Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        

    } //End method




    /////////////////Facility Methods////////////

    public function AllFacility(){

        $facility = Facilities::latest()->get();
        return view('backend.facilities.all_facility',compact('facility'));

    } //End method

    public function AddFacility(){

        
        return view('backend.facilities.add_facility');

    } //End method

    public function StoreFacility(Request $request){


        Facilities::insert([
            'facility_name' => $request->facility_name

        ]);

        $notification = array(

            'message' => 'Facility Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.facility')->with($notification);
        

    } //End method

}
