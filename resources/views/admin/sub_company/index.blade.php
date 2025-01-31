@extends('admin.layouts.app') 
    @section('content') 
        
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sub Comapny</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Sub Comapny</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h4 class="header-title">List</h4>
                                                                                              
                                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                    @foreach ( $subCompanys as $subCompany)
                                                        <tr>
                                                            <td>{{ $subCompany->name }}</td>
                                                            <td>
                                                                @if ($subCompany->status == 'active')
                                                                    <span class="badge bg-success">Active</span>
                                                                @else   
                                                                    <span class="badge bg-danger">Inactive</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($subCompany->status == 'active')
                                                                    <button type="button" class="btn btn-danger">Inactive</button>
                                                                @else   
                                                                    <button type="button" class="btn btn-success">Active</button>
                                                                @endif
                                                                <button type="button" class="btn btn-warning">Edit</button>
                                                                <button type="button" class="btn btn-danger">Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div>

                </div> <!-- container -->

            </div> <!-- content -->
    @endsection
