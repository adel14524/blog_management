@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Simple card -->
                    <div class="card"><br><br>
                        <center>
                            <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" data-holder-rendered="true">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Hello Welcome back {{ $adminData->name }} !</h4>
                            <hr>
                            <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                            <hr>
                            <h4 class="card-title">Username :  {{ $adminData->username }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info waves-effect waves-light" >Edit Profile</a>
                        </div>
                    </div>

                </div><!-- end col -->
            </div>
        </div>
    </div>
@endsection