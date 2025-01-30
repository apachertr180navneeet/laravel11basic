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
                                    <li class="breadcrumb-item active">My Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">My Profile</h4>
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
                                    <form action="{{route('admin.update.profile')}}" method="post"  enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                                                    @error('name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" value="{{ $user->phone }}">
                                                    @error('phone')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="avatar" class="form-label">Profile</label>
                                                    <input type="file" name="avatar" accept="image/*" class="form-control" id="avatar" aria-describedby="inputGroupFileAddon04" aria-label="Upload" onchange="document.getElementById('user-image').src = window.URL.createObjectURL(this.files[0])">
                                                    @error('avatar')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                @if($user->avatar)
                                                    <img src="{{asset($user->avatar)}}" class="user-image" id="user-image">
                                                @else
                                                    <img src="{{asset('admin/assets/images/users/avatar-1.jpg')}}" class="user-image" id="user-image">
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" id="address" name="address" rows="5">{{ $user->address }}</textarea>
                                                    @error('address')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
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
