<?php

namespace App\Http\Controllers\Backend;

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
use App\Models\State;

class PropertyController extends Controller
{
    public function AllProperty(){

        $property = Property::latest()->get();
        return view('backend.property.all_property',compact('property'));

    } // End Method 

    public function AddProperty(){

        $propertytype = PropertyType::latest()->get();
        $pstate = State::latest()->get();
        $facilities = Facilities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();
        return view('backend.property.add_property',compact('propertytype','facilities','activeAgent','pstate'));

    }// End Method


    public function StoreProperty(Request $request){

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
            'agent_id' => $request->agent_id,
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

        return redirect()->route('all.property')->with($notification);

    }// End Method 


    public function EditProperty($id){

        $property = Property::findOrFail($id);


        $type = $property->facility_id;
        $property_facility = explode(',', $type);



        $propertytype = PropertyType::latest()->get();
        $pstate = State::latest()->get();
        $facilities = Facilities::latest()->get();
        $activeAgent = User::where('status','active')->where('role','agent')->latest()->get();

        return view('backend.property.edit_property',compact('property','propertytype','facilities','activeAgent','property_facility','pstate'));


    }// End Method 


    public function UpdateProperty(Request $request){


        $facil = $request->facility_id;
        $facility = implode(",", $facil);   

        $property_id =$request->id;
        Property::findOrFail($property_id)->update([

            'ptype_id' => $request->ptype_id,
            'facility_id' => $facility,
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
            'agent_id' => $request->agent_id,
            'updated_at' => Carbon::now(), 



        ]);

        $notification = array(
            'message' => 'Property Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.property')->with($notification);


    }// End Method 



    public function UpdatePropertyThumbnail(Request $request){

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('property_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,250)->save('upload/property/thumbnail/'.$name_gen);
        $save_url = 'upload/property/thumbnail/'.$name_gen;

        if (file_exists($oldImage)) {
            
            unlink($oldImage);


        }

        Property::findOrFail($pro_id)->update([
            
            'property_thumbnail' =>$save_url,
            'updated_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Property image thumb Successfully updated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);





    }   // End Method 









}
