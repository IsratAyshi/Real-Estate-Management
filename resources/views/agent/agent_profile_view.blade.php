@extends('agent.agent_dashboard')
@section('agent')


<div class="page-content">

        
        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  

                  <div>
                    
                    <span class="h4 ms-3 ">{{ $profileData->username }}</span>
                  </div>

                  
                 
                </div>
                
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                  <p class="text-muted">{{ $profileData->name }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{ $profileData->email }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                  <p class="text-muted">{{ $profileData->phone}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                  <p class="text-muted">{{ $profileData->address}}</p>
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

								<h6 class="card-title">Update Agent Profile </h6>

								<form method="POST" action = "{{route('agent.profile.store')}}"  class="forms-sample" enctype = "multipart/form-data">

                                @csrf

									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Username</label>
										<input type="text" name="username" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}">
									</div>


                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Name</label>
										<input type="text"  name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->name}}">
									</div>


									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Email address</label>
										<input type="email" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->email}}">
									</div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Phone</label>
										<input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->phone}}">
									</div>

                                    <div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Address</label>
										<input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->address}}">
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