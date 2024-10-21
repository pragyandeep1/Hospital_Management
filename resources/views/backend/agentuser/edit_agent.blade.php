@extends('admin.admin_dashboard')
@section('title', 'Add Agent')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">

<div class="page-content">

	<div class="row profile-body">
		<div class="col-md-12 col-xl-12 middle-wrapper">
			<div class="row">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Add Agent</h6>
						<form id="myForm" method="POST" action="{{route('store.agent')}}" class="forms-sample">
							@csrf
							<div class="d-flex">
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Agent Name</label>
									<input type="text" name="name" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Agent Email</label>
									<input type="email" name="email" class="form-control">
								</div>
							</div>
							<div class="d-flex">
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Agent Password</label>
									<input type="password" name="password" class="form-control">
								</div>
								<div class="col-md-6 mb-3">
									<label for="exampleInputEmail1" class="form-label">Agent Phone</label>
									<input type="text" name="phone" class="form-control">
								</div>
							</div>
							<div class="col-md-12 mb-3">
								<label for="exampleInputEmail1" class="form-label">Agent Address</label>
								<textarea name="address" class="form-control"></textarea>
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