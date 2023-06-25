@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Services</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Services Data</h4><br><br>
                    
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Services Title</th>
                                    <th>Services Logo</th>
                                    <th>Services Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php($i = 1)

                                @foreach($services as $key => $item)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $item->title }} </td>
                                        <td> <img src="{{ asset($item->services_logo) }}" style="width: 60px; height: 60px;"></td>
                                        <td> <img src="{{ asset($item->services_image) }}" style="width: 60px; height: 50px;"> </td>
                                        <td>
                                            <a href="{{ route('edit.services',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('delete.services',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

@endsection