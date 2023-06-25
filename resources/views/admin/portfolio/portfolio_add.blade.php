@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Portfolio Page </h4><br>

                        <form method="post" id="portfolioForm" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="portfolio_name" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                <div class="form-group col-sm-10">
                                    <input name="portfolio_title" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description </label>
                                <div class="form-group col-sm-10">
                                    <textarea id="elm1" name="portfolio_description">

                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image </label>
                                <div class="form-group col-sm-10">
                                    <input name="portfolio_image" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="form-group col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <br><hr><br>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Date</label>
                                <div class="form-group col-sm-3">
                                    <input name="project_date" class="form-control" type="date" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Location</label>
                                <div class="form-group col-sm-10">
                                    <input name="project_location" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Client</label>
                                <div class="form-group col-sm-10">
                                    <input name="project_client" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Link</label>
                                <div class="form-group col-sm-10">
                                    <input name="project_link" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Image 1</label>
                                <div class="form-group col-sm-10">
                                    <input name="project_image1" class="form-control" type="file" id="image1">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="form-group col-sm-10">
                                    <img id="showImage1" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Image 2</label>
                                <div class="form-group col-sm-10">
                                    <input name="project_image2" class="form-control" type="file" id="image2">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="form-group col-sm-10">
                                    <img id="showImage2" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <br><hr><br>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact Address</label>
                                <div class="form-group col-sm-10">
                                    <textarea name="contact_address" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact Mail</label>
                                <div class="form-group col-sm-10">
                                    <input name="contact_mail" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact Phone</label>
                                <div class="form-group col-sm-10">
                                    <input name="contact_phone" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Github Link</label>
                                <div class="form-group col-sm-10">
                                    <input name="contact_github" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Website Link</label>
                                <div class="form-group col-sm-10">
                                    <input name="contact_website" class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            <br>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Protfolio Data">
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

        $('#portfolioForm').validate({
            rules: {
                portfolio_name: {
                    required : true,
                },
                portfolio_title: {
                    required : true,
                },
                portfolio_description: {
                    required : true,
                    minlength : 20,
                },
                portfolio_image: {
                    required : true,
                },
                project_date: {
                    required : true,
                },
                project_location: {
                    required : true,
                },
                project_client: {
                    required : true,
                },
                project_link: {
                    required : true,
                },
                project_image1: {
                    required : true,
                },
                project_image2: {
                    required : true,
                },
                contact_address: {
                    required : true,
                    minlength : 20,
                },
                contact_mail: {
                    required : true,
                    email : true,
                },
                contact_phone: {
                    required : true,
                    number : true,
                },
                contact_github: {
                    required : true,
                },
                contact_website: {
                    required : true,
                },
            },
            messages :{
                portfolio_name: {
                    required : 'Please Add A Portfolio Name',
                },
                portfolio_title: {
                    required : 'Please Add A Portfolio Title',
                },
                portfolio_description: {
                    required : 'Please Add A Portfolio Description',
                    minlength : 'Ops ! Oversees The Minimum Length',
                },
                portfolio_image: {
                    required : 'Please Add A Portfolio Image',
                },
                project_date: {
                    required : 'Please Add A Project Date',
                },
                project_location: {
                    required : 'Please Add A Project Location',
                },
                project_client: {
                    required : 'Please Add A Project Client',
                },
                project_link: {
                    required : 'Please Add A Project Link',
                },
                project_image1: {
                    required : 'Please Add A Project Image',
                },
                project_image2: {
                    required : 'Please Add A Project Image',
                },
                contact_address: {
                    required : 'Please Add An Address',
                    minlength : 'Ops ! Oversees The Minimum Length',
                },
                contact_mail: {
                    required : 'Please Add An Email',
                    email : 'The email should be in the format: abc@domain.tld',
                },
                contact_phone: {
                    required : 'Please Add A Phone Number',
                    number : 'Phone Must Be In Numerical Values'
                },
                contact_github: {
                    required : 'Please Add A Github Link For The Project',
                },
                contact_website: {
                    required : 'Please Add A Website Link For The Project',
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