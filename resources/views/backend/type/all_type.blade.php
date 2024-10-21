@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<a href="{{route('add.type')}}" class="btn btn-inverse-info">Add Property Type</a>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Property Type</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl No</th>
                        <th>Type Name</th>
                        <th>Type Icon</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($types as $key => $item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->type_name}}</td>
                        <td>{{$item->type_icon}}</td>
                        <td>

                          @if(Auth::user()->can('edit.type'))
                          <a href="{{route('edit.type',$item->id)}}" class="btn btn-inverse-warning"><i class="fas fa-edit"></i></a>
                          @endif

                          @if(Auth::user()->can('delete.type'))
                          <a href="{{route('delete.type',$item->id)}}" class="btn btn-inverse-danger"><i class="fas fa-trash"></i></a>
                          @endif
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