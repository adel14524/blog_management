@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Services</h4><br><br>

                        <form method="post" id="servicesForm" action="{{ route('store.services') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="form-group col-sm-10">
                                    <input name="title" class="form-control" type="text"  id="example-text-input">
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

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="form-group col-sm-10">
                                    <textarea id="elm1" name="long_description"></textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Services Logo</label>
                                <div class="form-group col-sm-10">
                                    <input name="services_logo" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="form-group col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Services Image</label>
                                <div class="col-sm-10">
                                    <input name="services_image" class="form-control" type="file" id="image1">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage1" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Detail Image 1</label>
                                <div class="col-sm-10">
                                    <input name="image1" class="form-control" type="file" id="image2">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage2" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Service Detail Image 2</label>
                                <div class="col-sm-10">
                                    <input name="image2" class="form-control" type="file" id="image3">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage3" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add New Services">
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

        $('#image1').change(function(e){
            var reader1 = new FileReader();
            reader1.onload = function(e){
                $('#showImage1').attr('src',e.target.result);
            }
            reader1.readAsDataURL(e.target.files['0']);
        });

        $('#image2').change(function(e){
            var reader2 = new FileReader();
            reader2.onload = function(e){
                $('#showImage2').attr('src',e.target.result);
            }
            reader2.readAsDataURL(e.target.files['0']);
        });

        $('#image3').change(function(e){
            var reader3 = new FileReader();
            reader3.onload = function(e){
                $('#showImage3').attr('src',e.target.result);
            }
            reader3.readAsDataURL(e.target.files['0']);
        });

        $('#servicesForm').validate({
            rules: {
                title: {
                    required : true,
                },
                short_description: {
                    required : true,
                    minlength: 20,
                },
                long_description: {
                    required : true,
                    minlength: 200,
                },
                services_logo: {
                    required : true,
                },
                image1 : {
                    required : true,
                },
                image2 : {
                    required : true,
                },
            },
            messages :{
                title: {
                    required : 'Please Enter Services Title',
                },
                short_description: {
                    required : 'Please Enter Short Description for This Services',
                    minlength: "Ops ! Must at least 20 Character"
                },
                long_description: {
                    required : 'Please Enter a Long Description for this Services',
                    minlength: "Ops ! Must at least 200 Character"
                },
                services_logo: {
                    required : 'Please Enter Services Logo',
                },
                image1 : {
                    required : 'Please enter the Services Detail Image',
                },
                image2 : {
                    required : 'Please enter the Services Detail Image',
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