@extends('layouts.main')

@section('content')
 <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Users Management</h1>
          <p>Basic bootstrap tables</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Simple Tables</a></li>
        </ul>
        <div class="pull-right">
            {{-- <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="{{ route('users.create') }}"> Create New User</a> --}}
            @can('role-create')
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create New User</button>
            @endcan
        </div>
      </div>
      <div class="container">
		 
		  <div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        
		        <div class="modal-body">
					{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
					<div class="row">
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Name:</strong>
					            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Email:</strong>
					            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Password:</strong>
					            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Confirm Password:</strong>
					            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="col-xs-12 col-sm-12 col-md-12">
					        <div class="form-group">
					            <strong>Role:</strong>
					            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
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
              <table class="table">
                <thead>
                  <tr>
					   <th>No</th>
					   <th>Name</th>
					   <th>Email</th>
					   <th>Roles</th>
					   <th width="280px">Action</th>
					 </tr>
                </thead>
                <tbody>
                 @foreach ($data as $key => $user)
				  <tr>
				    <td>{{ ++$i }}</td>
				    <td>{{ $user->name }}</td>
				    <td>{{ $user->email }}</td>
				    <td>
				      @if(!empty($user->getRoleNames()))
				        @foreach($user->getRoleNames() as $v)
				           <label class="badge badge-success">{{ $v }}</label>
				        @endforeach
				      @endif
				    </td>
				    <td>
				       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
				       @can('role-edit')
				       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
				       @endcan
				       @can('role-delete')
				        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				        {!! Form::close() !!}
				        @endcan
				    </td>
				  </tr>
				 @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection