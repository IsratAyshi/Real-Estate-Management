<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\PropertyService;
use App\Models\Facilities;
use App\Models\PropertyType;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyMessage;


class AgentPropertyController extends Controller
{
    public function AgentAllProperty(){

        $id = Auth::user()->id;
        $property = Property::where('agent_id',$id)->latest()->get();
        return view('agent.property.all_property',compact('property'));

    } // End Method 

    public function AgentAddProperty(){

        $propertytype = PropertyType::latest()->get();
        $facilities = Facilities::latest()->get();

        return view('agent.property.add_property',compact('propertytype','facilities'));

    }// End Method

    public function AgentStoreProperty(Request $request){

        $facil = $request->facility_id;
        $facility = implode(",", $facil);
        // dd($amenites);

        $pcode = IdGenerator::generate(['table' => 'properties','field' => 'property_code','length' => 5, 'prefix' => 'PC' ]);

        $image = $request->file('property_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,250)->save('upload/property/thumbnail/'.$name_gen);
        $save_url = 'upload/property/thumbnail/'.$name_gen;

        $property_id = Property::insertGetId([

            'ptype_id' => $request->ptype_id,
            'facility_id' => $facility,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_code' => $pcode,
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            

            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot_exclusive' => $request->hot,
            'agent_id' => Auth::user()->id,
            'status' => 1,
            'property_thumbnail' => $save_url,
            'created_at' => Carbon::now(),



        ]);

        /// Multiple Image  ////

        $images = $request->file('multi_img');
        foreach($images as $img){
       
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(770,520)->save('upload/property/multi-image/'.$make_name);
            $uploadPath = 'upload/property/multi-image/'.$make_name;
       
            MultiImage::insert([
       
                'property_id' => $property_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 
       
            ]); 
        } // End Foreach
       
        /// End Multiple Image ////

        /// Property Service/benefits ////

        $services = Count($request->service_name);

        if ($services != NULL) {
           for ($i=0; $i < $services; $i++) { 
               $fcount = new PropertyService();
               $fcount->property_id = $property_id;
               $fcount->service_name = $request->service_name[$i];
               $fcount->distance = $request->distance[$i];
               $fcount->save();
           }
        }

         /// End Property Service  ////


            $notification = array(
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('agent.all.property')->with($notification);


    }// End Method


    public function AgentEditProperty($id){

        $services = PropertyService::where('property_id',$id)->get();
        $property = Property::findOrFail($id);

        $type = $property->facility_id;
        $property_faci = explode(',', $type);

        $multiImage = MultiImage::where('property_id',$id)->get();

        $propertytype = PropertyType::latest()->get();
        $facilities = Facilities::latest()->get();

        return view('agent.property.edit_property',compact('property','propertytype','facilities','property_faci','multiImage','services'));

    }// End Method 


    public function AgentUpdateProperty(Request $request){

        $facil = $request->facility_id;
        $facilities = implode(",", $facil);

        $property_id = $request->id;

        Property::findOrFail($property_id)->update([

            'ptype_id' => $request->ptype_id,
            'facility_id' => $facilities,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)), 
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            

            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot_exclusive' => $request->hot,
            'agent_id' => Auth::user()->id, 
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('agent.all.property')->with($notification); 

    }// End Method 

    public function AgentPropertyMessage(){

        $id = Auth::user()->id;
        $usermsg = PropertyMessage::where('agent_id',$id)->get();
        return view('agent.message.all_message',compact('usermsg'));

    }// End Method

    public function AgentMessageDetails($id){

        $uid = Auth::user()->id;
        $usermsg = PropertyMessage::where('agent_id',$uid)->get();

        $msgdetails = PropertyMessage::findOrFail($id);
        return view('agent.message.message_details',compact('usermsg','msgdetails'));

    }// End Method  
    
}
