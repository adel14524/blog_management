@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Skills</h4><br><br>

                        <form method="post" id="skillForm" action="{{ route('skill.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Skill</label>
                                <div class="form-group col-sm-10">
                                    <input name="skill" class="form-control" type="text" id="">
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Percentage</label>
                                <div class="form-group col-sm-10">
                                    <input name="skill_range" class="form-control" type="number" id="skill_range">
                                </div>
                            </div>
                            <!-- end row -->
                            <br>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Skill">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#skillForm').validate({
            rules: {
                skill: {
                    required : true,
                },
                skill_range: {
                    required : true,
                    number: true,
                    max: 100,
                },
            },
            messages :{
                skill: {
                    required : 'Please Enter Skill',
                },
                skill_range: {
                    required : 'Please Rate Your Skill (%)',
                    number: "Please Enter Your Skill Range in Numerical Value",
                    max: "Ops ! Exceeded Maximum Amount"
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