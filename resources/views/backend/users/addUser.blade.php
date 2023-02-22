@extends('layouts.backendapp')
@section('backend_content')
<div class="col-lg-12">
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-12 row">
        <div style="padding: 5px; background-color: rgb(28, 63, 170); color:white;" class=" card col-lg-12">
            <p>Add new employee</p>
        </div>
        <div class="col-lg-8 mx-auto">
            <div class=" card col-lg-12">
                <label style="padding: 10px;" for="role">
                    Roles:
                    <select class="form-control" name="role" id="role">
                        <option selected disabled>Select a role</option>
                        @forelse ($roles as $role)
                        <option value="{{ $role->id }}">{{ Str::ucfirst($role->name) }}</option>
                        @empty
                        <option selected disabled>No role found</option>
                        @endforelse
                    </select>
                    <span style="color: red;">
                        @error('role')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </span>
                </label>
            </div>
            <div class=" card col-lg-12">
                <label for="name" style="padding: 10px;">
                    <input class="form-control" id="name" type="text" name="name" placeholder="User name">
                    <span style="color: red;">
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </span>
                </label>
            </div>
            <div class=" card col-lg-12">
                <label for="email" style="padding: 10px;">
                    <input class="form-control" id="email" type="text" name="email" placeholder="User email">
                    <span style="color: red;">
                        @error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </span>
                </label>
            </div>
            <div class=" card col-lg-12">
                <label for="password" style="padding: 10px;">
                    <input class="form-control" id="password" type="text" name="password" placeholder="New password">
                    <span style="color: red;">
                        @error('password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </span>
                </label>
            </div>
            <div class=" card col-lg-12">
                <label for="confirm_password" style="padding: 10px;">
                    <input class="form-control" id="confirm_password" type="text" name="confirm_password" placeholder="Confirm new password">
                    <span style="color: red;">
                        @error('confirm_password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </span>
                </label>
            </div>
        </div>
        <div class=" card col-lg-4 mx-auto">
            <div style="padding-top: 5%;" class=" mx-auto col-lg-12">
                <label for="imagefile">
                    Choose an image:
                    <input type="file" id="imagefile" style="visibility: hidden;" name="image" class="postImg">
                    <img class="liveImage" src="{{ asset('backend/dist/images/imageplaceholder.png') }}" alt="" style="width: 100%; height:235px;">
                    <span style="color: red;">
                        @error('image')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </span>
                </label>
            </div>
        </div>
            <div class="col-lg-12">
                 <button class="btn btn-sm btn-primary" style="margin: 10px" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection