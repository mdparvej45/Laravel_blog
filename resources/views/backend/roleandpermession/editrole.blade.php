@extends('layouts.backendapp')

@section('backend_content')
{{-- This section access to need role edit section --}}
@can('role edit')
<div class="row col-lg-12 mx-auto" style="border-bottom: 2px solid rgb(34, 38, 255);">
    <div class="card col-lg-6">
        <form action="{{ route('role.store') }}" method="post">
            @csrf
            <div class="card-body mt-1">
                <input class="form-control" name="role_name" value="{{ $role->name }}" type="text">
                    @error('role_name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                <button class=" btn btn-sm form-control btn-primary mt-2">Role Update</button>
            </div>
        </form>
    </div>
</div>      
@endcan
@endsection