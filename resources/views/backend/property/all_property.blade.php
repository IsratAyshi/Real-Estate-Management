@extends('admin.admin_dashboard')
@section('admin')


<!-- partial -->

<div class="page-content">

<nav class="page-breadcrumb">
					<ol class="breadcrumb">
            <a href="{{route('add.property')}}" class="btn btn-inverse-info"> Add Property </a>
					</ol>
				</nav>

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Tables</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title">Property All</h6>
<p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>property ID</th> 
        <th>name</th>
        <th>desc</th>
        <th>address</th>
        <th>city</th>
        <th>status</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
    
    @foreach($property as $key => $item)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $item->ptype_id }}</td>
        <td>{{ $item->property_name }}</td>
        <td>{{ $item->long_descp }}</td>
        <td>{{ $item->address }}</td>
        <td>{{ $item->city }}</td>


        @if($item->status==1)

        <span class="badge rounded-pill bg-success"> Active </span>

        @else
        <span class="badge rounded-pill bg-danger"> Inactive </span>
        @endif
       
        <td>
    <a href="{{route('edit.type',$item->id)}}"  class="btn btn-warning"> Edit </a>
    <a href="{{route('delete.type',$item->id)}}"  class="btn btn-danger" id="delete"> Delete </a>

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

<!-- partial:../../partials/_footer.html -->
<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
<p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>
<!-- partial -->

</div>
</div>















@endsection