@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
        <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Export Permission</h6>
                    <form id="myForm" method="POST" action="{{route('store.permission')}}" class="forms-sample">
                      @csrf
                        <div class="form-group mb-3">
                           <label for="permission_name" class="form-label">Xlsx File Export</label>
                           <input type="file" name="export_file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-inverse-danger me-2">Download</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
        <div class="d-none d-xl-block col-xl-3"></div>
        <!-- right wrapper end -->
    </div>
</div>

@endsection