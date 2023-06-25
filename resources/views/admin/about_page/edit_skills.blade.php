@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Skills</h4><br><br>

                        <form method="post" action="{{ route('update.skill') }}">
                            @csrf

                            <input type="hidden" name="id" id="skill_id" value="{{ $skillpage->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Skill</label>
                                <div class="col-sm-10">
                                    <input name="skill" class="form-control" type="text" value="{{ $skillpage->skill }}" id="">
                                    <span><small>** Please select the skills you wish to edit first **</small></span>
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Percentage</label>
                                <div class="col-sm-10">
                                    <input name="skill_range" class="form-control skill_range" value="{{ $skillpage->skill_range }}" type="number" id="skill_range">
                                </div>
                            </div>
                            <!-- end row -->
                            <br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Skill">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

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