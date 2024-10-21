@extends('admin.admin_dashboard')
@section('title', 'All Admin')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">

<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<a href="{{rout('add.agent')}}" class="btn btn-inverse-info">Add Agent</a>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title">All Agents</h6>
					<div class="table-responsive">
						<table id="tableDataExample" class="table">
							<thead>
								<tr>
									<th>Sl</th>
									<th>Image</th>
									<th>Name</th>
									<th>Role</th>
									<th>Status</th>
									<th>Change</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($allagent as $key => $item)
								<tr>
									<td>{{$key+1}}</td>
									<td><img src="{{(!empty($item->photo)) ? url('upload/agent_images/'.$item->photo) : url('upload/no-image.jpg')}}" style="width: 70px; height: 40px;"></td>
									<td>{{$item->name}}</td>
									<td>{{$item->role}}</td>
									<td>
										@if($item->status == 'active')
										<span class="badge rounded-pill bg-success">Active</span>
										@else
										<span class="badge rounded-pill bg-danger">Inactive</span>
										@endif
									</td>
									<td>
										<input type="checkbox" class="toggle-class" data-id="{{$item->id}}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{$item->status ? 'checked' : ''}}>
									</td>
									<td>
										<a href="{{route('edit.agent',$item->id)}}" class="btn btn-inverse-warning" title="Edit">
											<i data-feather="edit"></i>
										</a>
										<a href="{{route('delete.agent',$item->id)}}" class="btn btn-inverse-danger" title="Delete">
											<i data-feather="trash-2"></i>
										</a>
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