@extends('admin.admin_dashboard')
@section('title', 'All Roles')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<a href="{{route('add.roles')}}" class="btn btn-inverse-info">Add Role</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Roles</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl No</th>
                        <th>Role Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($roles as $key => $item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                          <a href="{{route('edit.roles',$item->id)}}" class="btn btn-inverse-warning"><i class="fas fa-edit"></i></a>
                          <a href="{{route('delete.roles',$item->id)}}" class="btn btn-inverse-danger"><i class="fas fa-trash"></i></a>
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