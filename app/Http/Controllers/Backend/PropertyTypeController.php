<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;
use App\Models\Amenities;

class PropertyTypeController extends Controller
{
    //
    public function AllType(){


        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));

    } //end



    public function AddType(){


        
        return view('backend.type.add_type');

    } //end

            
    public function StoreType(Request $request){

        $request->validate([
            'type_name' => 'required|unique:property_types|max:250',
            'type_icon' => 'required'
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon


        ]);

        $notification = array(

            'message' => ' New Property - Type created ',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
        

    } //End method

    public function EditType($id){

        
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));

    } //End method

    public function UpdateType(Request $request){

        $pid = $request->id;

        PropertyType::findOrFail($pid)->update([    
       

       
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon


        ]);

        $notification = array(

            'message' => ' prop type updated successfully ',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
        

    } //End method

    public function DeleteType($id){

        PropertyType::findOrFail($id)->delete();


        $notification = array(

            'message' => ' selected type DELETED ',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }//End method

    //amenities control

    public function AllAmenitie(){


        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities',compact('amenities'));

    } //end


    public function AddAmenitie(){


        return view ('backend.amenities.add_amenities');
    }

     


}
