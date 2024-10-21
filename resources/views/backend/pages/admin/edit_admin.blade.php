@extends('admin.admin_dashboard')
@section('title', 'Add Admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">

<div class="page-content">

	<div class="row profile-body">
		<div class="col-md-12 col-xl-12 middle-wrapper">
			<div class="row">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Add Admin</h6>
						<form id="myForm" method="POST" action="{{route('update.admin',$user->id)}}" class="forms-sample">
							@csrf
							<div class="d-flex">
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Admin Name</label>
									<input type="text" name="name" class="form-control" value="{{$user->name}}">
								</div>
								<div class="col-md-6 mb-3 mx-1">
									<label for="exampleInputEmail1" class="form-label">Admin User Name</label>
									<input type="text" name="username" class="form-control" value="{{$user->username}}">
								</div>
							</div>
							<div class="d-flex">
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Admin Email</label>
									<input type="email" name="email" class="form-control" value="{{$user->email}}">
								</div>
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Admin Phone</label>
									<input type="text" name="phone" class="form-control" value="{{$user->phone}}">
								</div>
							</div>
							<div class="d-flex">
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Role Name</label>
									<select name="roles" class="form-select" id="exampleFormControlSelect">
		                               <option selected="" disabled="">Select Role</option>
		                               @foreach($roles as $role)
		                               <option value="{{$role->id}}" {{$user->hasRole($role->name) ? 'selected' : ''}}>{{$role->name}}</option>
		                               @endforeach
		                           </select>
								</div>
								<div class="col-md-6 mb-3 mx-1">
									<label for="exampleInputEmail1" class="form-label">Admin Address</label>
									<textarea name="address" class="form-control" value="{{$user->address}}"></textarea>
								</div>
							</div>
							
							<button type="submit" class="btn btn-primray me-2">Save Changes</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection