
@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  

                  <div>
                    
                    <span class="h4 ms-3 ">You can add new Agent here</span>
                  </div>

                  
                 
                </div>
                
                
                
              </div>
            </div>
          </div>
          <!-- left wrapper end -->        
        
          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Add Agent</h6>

								<form method="POST" action = "{{route('admin.addagent.submit')}}"  class="forms-sample" enctype = "multipart/form-data">

                                @csrf


                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label"> Agent Name</label>
										<input type="text"  name="name" class="form-control" required="">
									</div>


									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Email address</label>
										<input type="email" name="email" class="form-control" required="">
									</div>


                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Password</label>
										<input type="password" name="password" class="form-control" required="" >
									</div>

						
									<button type="submit" class="btn btn-primary me-2">Submit</button>
									<button class="btn btn-secondary">Cancel</button>
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