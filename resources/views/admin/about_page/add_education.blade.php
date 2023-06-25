@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Education</h4><br><br>

                        <form method="post" id="educationForm" action="{{ route('store.education') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="form-group col-sm-10">
                                    <input name="title" class="form-control" type="text"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Year Duration</label>
                                <div class="form-group col-sm-10">
                                    <input name="year" class="form-control" type="text" id="year">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="form-group col-sm-10">
                                    <textarea name="short_description" class="form-control" id="short_description" rows="5"></textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add New Education">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

        $('#educationForm').validate({
            rules: {
                title: {
                    required : true,
                },
                year: {
                    required : true,
                    number: true,
                },
                short_description: {
                    required : true,
                    minlength: 20,
                },
            },
            messages :{
                title: {
                    required : 'Please Enter Education Title',
                },
                year: {
                    required : 'Please Enter Year Duration',
                    number : 'Year Must Be in Numerical Values'
                },
                short_description: {
                    required : 'Please Enter a Short Description for Education',
                    minlength: "Ops ! Oversees Minimum Amount"
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

@endsection