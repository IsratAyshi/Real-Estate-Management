@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">


				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Agent Information </h6>

                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Serial </th>
                        <th>Name </th> 
                        <th>Role </th> 
                        <th>Status </th> 
                        <th>Change </th>  
                        <th>Action </th> 
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($allagent as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        
                        <td>{{ $item->name }}</td> 
                        <td>{{ $item->role }}</td>  
                        <td> 
                      @if($item->status == 'active')
                <span class="badge rounded-pill bg-success">Active</span>
                      @else
               <span class="badge rounded-pill bg-danger">InActive</span>
                      @endif 
                        </td> 

                    <td>Change </td>  


                        <td>


       <a href="" class="btn btn-inverse-warning" title="Edit"> <i data-feather="edit"></i> </a>

       <a href="" class="btn btn-inverse-danger" id="delete" title="Delete"> <i data-feather="trash-2"></i>  </a>
                        </td> 
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>






@endsection