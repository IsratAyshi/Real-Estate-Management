@extends('admin.admin_dashboard')
@section('admin')

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{route('add.facility')}}" class="btn btn-inverse-info"> Add New Facility</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Facilities</h6>
               
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Serial</th>
                        <th>Facility Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($facility as $key => $item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->facility_name}}</td>
                        <td>
        <a href="" class="btn btn-inverse-warning"> Edit</a>
        <a href="" class="btn btn-inverse-danger" id='delete'> Delete</a>
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