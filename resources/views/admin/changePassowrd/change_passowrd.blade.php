@extends('admin.layouts.app') 
@section('style')
<style>
 .user-image{
    height: 70px;
    width: auto;
    border:1px dotted lightgray;
    padding:4px;
    margin: 0 auto;
 }  
</style>
@endsection
@section('content') 

<style>
    .user-image{
        height: 70px;
        width: auto;
        border:1px dotted lightgray;
        padding:4px;
        margin: 0 auto;
    }
</style>
    
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
                                    <li class="breadcrumb-item active">Change Password</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Change Password</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if (session('success'))
                                    <x-alert />
                                @endif

                                @if (session('error'))
                                    <x-alert />
                                @endif
                                <div class="row align-items-center">
                                    <form action="{{ route('admin.update.passowrd') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="oldPasswordInput" class="form-label">Old Password</label>
                                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" placeholder="Old Password">
                                                    @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="newPasswordInput" class="form-label">New Password</label>
                                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="New Password">
                                                    @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->
@endsection
