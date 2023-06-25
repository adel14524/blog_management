@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Portfolio Edit Page</h4><br>

                        <form method="post" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{  $portfolio->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_name" class="form-control" type="text" value="{{ $portfolio->portfolio_name }}" id="example-text-input">
                                    @error('portfolio_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                <div class="col-sm-10">
                                    <input name="portfolio_title" class="form-control" type="text" value="{{ $portfolio->portfolio_title }}" id="example-text-input">
                                    @error('portfolio_title')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description </label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="portfolio_description">
                                        {{ $portfolio->portfolio_description }}
                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image </label>
                                <div class="col-sm-10">
                                    <input name="portfolio_image" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($portfolio->portfolio_image)) ? url($portfolio->portfolio_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <br><hr><br>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Date</label>
                                <div class="col-sm-3">
                                    <input name="project_date" class="form-control" type="date" value="{{ $portfolio->project_date }}" id="example-text-input">
                                    @error('project_date')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Location</label>
                                <div class="col-sm-10">
                                    <input name="project_location" class="form-control" type="text" value="{{ $portfolio->project_location }}" id="example-text-input">
                                    @error('project_location')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Client</label>
                                <div class="col-sm-10">
                                    <input name="project_client" class="form-control" type="text" value="{{ $portfolio->project_client }}" id="example-text-input">
                                    @error('project_client')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Link</label>
                                <div class="col-sm-10">
                                    <input name="project_link" class="form-control" type="text" value="{{ $portfolio->project_link }}" id="example-text-input">
                                    @error('project_link')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Image 1</label>
                                <div class="col-sm-10">
                                    <input name="project_image1" class="form-control" type="file" id="image1">
                                    @error('project_image1')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="col-sm-10">
                                    <img id="showImage1" class="rounded avatar-lg" src="{{ (!empty($portfolio->project_image1)) ? url($portfolio->project_image1) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Image 2</label>
                                <div class="col-sm-10">
                                    <input name="project_image2" class="form-control" type="file" id="image2">
                                    @error('project_image2')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="col-sm-10">
                                    <img id="showImage2" class="rounded avatar-lg" src="{{ (!empty($portfolio->project_image2)) ? url($portfolio->project_image2) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <br><hr><br>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact Address</label>
                                <div class="col-sm-10">
                                    <textarea name="contact_address" class="form-control">{{ $portfolio->contact_address }}</textarea>
                                    @error('contact_address')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact Mail</label>
                                <div class="col-sm-10">
                                    <input name="contact_mail" class="form-control" type="text" value="{{ $portfolio->contact_mail }}" id="example-text-input">
                                    @error('contact_mail')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Contact Phone</label>
                                <div class="col-sm-10">
                                    <input name="contact_phone" class="form-control" type="text" value="{{ $portfolio->contact_phone }}" id="example-text-input">
                                    @error('contact_phone')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Github Link</label>
                                <div class="col-sm-10">
                                    <input name="contact_github" class="form-control" type="text" value="{{ $portfolio->contact_github }}" id="example-text-input">
                                    @error('contact_github')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Website Link</label>
                                <div class="col-sm-10">
                                    <input name="contact_website" class="form-control" type="text" value="{{ $portfolio->contact_website }}" id="example-text-input">
                                    @error('contact_website')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio Data">
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
    });
</script>

@endsection