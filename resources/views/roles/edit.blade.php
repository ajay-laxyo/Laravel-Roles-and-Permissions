@extends('layouts.main')

@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Role Management</h1>
          <p>Basic bootstrap tables</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Simple Tables</a></li>
        </ul>
        <div class="pull-right">
        	@can('role-create')
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create New Role</button>
            @endcan
        </div>
      </div>
      <div class="container">
		 
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        
		        <div class="modal-body">
					{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
					<div class="row">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Name:</strong>
					            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Permission:</strong>
					            <br/>
					            @foreach($permission as $value)
					                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
					                {{ $value->name }}</label>
					            <br/>
					            @endforeach
					        </div>
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
					        <button type="submit" class="btn btn-primary">Submit</button>
					    </div>
					</div>
					{!! Form::close() !!}

		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		  
		</div>

      <div class="row">
       
        
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Responsive Table</h3>
            <div class="table-responsive">
              
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection