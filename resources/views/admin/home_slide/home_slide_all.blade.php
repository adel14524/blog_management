@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide Page</h4><br><br>

                            <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeslide->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="title" value="{{ $homeslide->title }}" type="text" placeholder="Title" id="title">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="short_title" rows="3" placeholder="short_title" id="short_title">{{ $homeslide->short_title }}</textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="video_url" value="{{ $homeslide->video_url }}" type="text" placeholder="video_url" id="video_url">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="home_image" type="file" value="{{ $homeslide->home_image }}" placeholder="Home Image" id="image">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_image))? url( $homeslide->home_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <br>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
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
        });
    </script>
@endsection