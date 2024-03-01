@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

        <div class="row profile-body">      
        
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Add Amenities </h6>

								<form method="POST" action = "{{route('store.type')}}"  class="forms-sample" >

                                @csrf


                                <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label"> Feature name</label>
										<input type="text"  name="facility_name" class="form-control @error('facility_name') is-invalid @enderror">
                                    @error('facility_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
									</div>

                                    

                                    


						
									<button type="submit" class="btn btn-primary me-2">Save</button>
									
								</form>

              </div>
            </div>
              
            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
          
            
          
          <!-- right wrapper end -->
        </div>

			</div>


























@endsection