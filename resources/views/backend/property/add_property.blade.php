@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
        <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Add Property</h6>
                    <form id="myForm" method="POST" action="{{route('store.property')}}" class="forms-sample">
                      @csrf
                        <div class="form-group mb-3">
                           <label for="property_name" class="form-label">Property Name</label>
                           <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                           <label for="group_name" class="form-label">Property Status</label>
                           <select name="property_status" class="form-select" id="exampleFormControlSelect">
                               <option selected="" disabled="">Select Status</option>
                               <option value="rent">For rent</option>
                               <option value="buy">For buy</option>
                           </select>
                        </div>
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                property_name: {
                    required : true,
                }, 
                
            },
            messages: {
                property_name: {
                    required : 'Please Enter Property Name',
                }, 
                 

            },
            errorElement: 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection