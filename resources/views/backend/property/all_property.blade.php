@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
	  <a href="{{ route('add.property') }}" class="btn btn-inverse-info"> Add New Property  </a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Property</h6>

                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Image </th> 
                        <th>Name </th> 
                        <th>Property Type </th> 
                        <th>Status Type </th> 
                        <th>City </th> 
                        <th>P_Code </th> 
                        <th>Status </th>  
                        <th>Action </th> 
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($property as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td><img src="{{ asset($item->property_thumbnail) }}" style="width:70px; height:40px;"> </td> 
                        <td>{{ $item->property_name }}</td> 
                        <td>{{ $item['type']['type_name'] }}</td> 
                        <td>{{ $item->property_status }}</td> 
                        <td>{{ $item->city }}</td> 
                        <td>{{ $item->property_code }}</td> 
                        <td> 
                      @if($item->status == 1)
                <span class="badge rounded-pill bg-success">Available</span>
                      @else
               <span class="badge rounded-pill bg-danger">Sold</span>
                      @endif

                        </td> 
                        <td>
       <a href="{{route('edit.property',$item->id)}}" class="btn btn-inverse-warning"> Edit </a>
       <a href="{{route('edit.property',$item->id)}}" class="btn btn-inverse-danger" id="delete"> Delete  </a>
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