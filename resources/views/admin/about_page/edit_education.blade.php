@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Education</h4><br><br>

                        <form method="post" action="{{ route('update.education') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" id="education_id" value="{{ $education->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" value="{{ $education->title }}" id="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Year Duration</label>
                                <div class="col-sm-10">
                                    <input name="year" class="form-control" type="text" value="{{ $education->year }}" id="year">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea name="short_description" class="form-control" id="short_description" rows="5">{{ $education->short_desc }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Education Section">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

{{-- <script type="text/javascript">
    
    $(document).ready(function(){
        $('#edu_title').on('change', function(){
            var educationID = this.value;
            $('#title').html('');
            $('#year').html('');
            $('#short_description').html('');
            $.ajax({
                url: '{{ route('get.education') }}?edu_id=' + educationID,
                type: 'get',
                success: function (res){
                    console.log(res);
                    $('#title').val(res.title);
                    $('#year').val(res.year);
                    $('#short_description').val(res.short_desc);
                    $('#education_id').val(res.id);
                }
            });
        });
    });
</script> --}}

@endsection