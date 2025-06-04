@extends('layouts.app')

@section('content')
<div class="container-full">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Profile</h4>
                    </div>
                    <div class="box-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('profile.update') }}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label col-md-2">Current Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="current_password">
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label col-md-2">New Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="new_password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label col-md-2">Confirm New Password</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="new_password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Profile Photo</h4>
                    </div>
                    <div class="box-body text-center">
                        <div class="mb-4">
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" 
                                     class="rounded-circle" 
                                     style="width: 150px; height: 150px; object-fit: cover;"
                                     alt="{{ $user->name }}">
                            @else
                                <div class="rounded-circle bg-primary-light d-inline-flex align-items-center justify-content-center"
                                     style="width: 150px; height: 150px;">
                                    <span class="text-white" style="font-size: 4rem;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="photo" class="form-control" accept="image/*" required>
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info mt-3">Update Photo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 