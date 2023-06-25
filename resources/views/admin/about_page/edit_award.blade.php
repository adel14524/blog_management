@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Award</h4><br><br>

                        <form method="post" action="{{ route('update.award') }}" enctype="multipart/form-data">
                            @csrf

                            <input name="id" type="hidden" value="{{ $awardData->id }}"/>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" value="{{ $awardData->title }}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea name="short_description" class="form-control" id="short_description" rows="5">{{ $awardData->short_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Award Logo</label>
                                <div class="col-sm-10">
                                    <input name="award_logo" class="form-control" type="file" value="{{ $awardData->awardLogo }}" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($awardData->award_logo))? url( $awardData->award_logo):url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
                            <br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit Award">
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

{{-- <script type="text/javascript">
    $(document).ready(function (){
        $('#skill').on('change', function(){
            var skillID = this.value;
            $('#skill_range').html('');
            $.ajax({
                url: '{{ route('get.skill') }}?skill_id=' + skillID,
                type: 'get',
                success: function (res){
                    $('.skill_range').val(res.skill_range);
                    $('#skill_id').val(res.id);
                }
            });
        });
    });
</script> --}}

@endsection