@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">
</script>


<div class="page-content">

        <div class="row profile-body">      
        
          <!-- middle wrapper start -->
          <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
            <div class="card">
							<div class="card-body">
								<h6 class="card-title">Add property</h6>
									<form method = "post" action="{{route('store.property')}}" id="myForm" enctype="multipart/form-data">

									@csrf

										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Property Name</label>
													<input type="text" name = "property_name" class="form-control">
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Property Status </label>
													<select name ="property_status" class="form-select" id="exampleFormControlSelect1">
											<option selected="" disabled="">Select status</option>
											<option value="buy">  BUY</option>
											<option value="rent"> RENT</option>
											
			
										    </select>
												</div>
											</div><!-- Col -->

                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Lowest price</label>
													<input type="text" name = "lowest_price" class="form-control">
												</div>
											</div><!-- Col -->
                                            	

                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">max price</label>
													<input type="text" name = "max_price" class="form-control" onChange="mainThumbUrl(this)">


                                                    <img src="" id="mainThumb">




												</div>
											</div><!-- Col -->


                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Main Thumbnail image</label>
													<input type="file" name = "property_thumbnail" class="form-control" onChange="mainThamUrl(this)">
												</div>
											</div><!-- Col -->


                                            <div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">Add more image</label>
													<input type="file" name = "property_thumbnail" class="form-control">
												</div>
											</div><!-- Col -->










										</div><!-- Row -->



                                    
					<div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">bedrooms</label>
													<input type="text" name = "bedrooms" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">bathrooms</label>
													<input type="text" name = "bedrooms" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">garage</label>
													<input type="text" name = "bedrooms" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">garage size</label>
													<input type="text" name = "property_size" class="form-control" >
												</div>
											</div><!-- Col -->
										</div><!-- Row -->

										<div class="row">
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">address</label>
													<input type="text" name = "address" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">city</label>
													<input type="text" name = "city" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">state</label>
													<input type="text" name = "state" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-3">
												<div class="mb-3">
													<label class="form-label">postal code</label>
													<input type="text" name = "postal_code" class="form-control" >
												</div>
											</div><!-- Col -->
										</div><!-- Row -->





										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">property size</label>
													<input type="text" name = "property_size" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">property video</label>
													<input type="text" name = "property_video" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">neighborhood</label>
													<input type="text" name = "neighborhood" class="form-control" >
												</div>
											</div><!-- Col -->
											
										</div><!-- Row -->





										<div class="row">
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">latitude</label>
													<input type="text" name = "latitude" class="form-control" >
													<a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Get your Address Latitude</a>
													
												</div>
											</div><!-- Col -->
											<div class="col-sm-6">
												<div class="mb-3">
													<label class="form-label">longitude</label>
													<input type="text" name = "longitude" class="form-control" >
													<a href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Get your Address Longitude</a>
													
												</div>
											</div><!-- Col -->
										</div><!-- Row -->



										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">property size</label>
													<input type="text" name = "property_size" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">property video</label>
													<input type="text" name = "property_video" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">neighborhood</label>
													<input type="text" name = "neighborhood" class="form-control" >
												</div>
											</div><!-- Col -->
											
										</div><!-- Row -->



										<div class="row">
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">property type</label>
													<select name ="ptype_id" class="form-select" id="exampleFormControlSelect1">
											<option selected="" disabled="">Select type</option>
											@foreach($propertytype as $ptype)
											<option value="{{$ptype->id}}"> {{$ptype ->type_name}}</option>
											@endforeach
			
										    </select>
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">property amenities</label>
													<input type="text" name = "property_video" class="form-control" >
												</div>
											</div><!-- Col -->
											<div class="col-sm-4">
												<div class="mb-3">
													<label class="form-label">agent</label>
													<select name ="agent_id" class="form-select" id="exampleFormControlSelect1">
											<option selected="" disabled="">Select agent</option>
											@foreach($activeAgent as $agent)
											<option value="{{$ptype->id}}"> {{$agent ->name}}</option>
											@endforeach
			
										    </select>
												</div>
											</div><!-- Col -->
											
										</div><!-- Row -->

										<div class="col-sm-8">
												<div class="mb-3">
													<label class="form-label">short description</label>
												<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
													
													
												</div>
											</div><!-- Col -->

											<div class="col-sm-12">
												<div class="mb-3">
													<label class="form-label">long description</label>
													<textarea class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
													
													
												</div>
											</div><!-- Col -->

<hr>

<div class="mb-3">
										<div class="form-check form-check-inline">
                      <input type="checkbox" name = "featured" value = "1" class="form-check-input" id="checkInline1">
											<label class="form-check-label" for="checkInline1">
												Featured property
											</label>
										</div>
										<div class="form-check form-check-inline">
                      <input type="checkbox" name = "hot" value = "1" class="form-check-input" id="checkInline">
											<label class="form-check-label" for="checkInline">
												HOT
											</label>
										</div>


									</form>
									<button type="button" class="btn btn-primary submit">Submit form</button>
							</div>
						</div>
</hr>
              
            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
          
            
          
          <!-- right wrapper end -->
        </div>

			</div>









<script type = "text/javascript">
    function mainThumbUrl(input){
        if(input.files && input.files[0]){

            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);

            };
            reader.readAsDataURL(input.files[0]);
        

        }





    }

</script>

@endsection



