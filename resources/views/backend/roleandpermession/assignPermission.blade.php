@extends('layouts.backendapp')
@section('backend_content')

<h3 style="margin-top: 2rem;color:blue;">{{ Str::ucfirst($selectRole->name) }}</h3>
<form action="{{ route('permission.added', $selectRole) }}" method="post">
    @csrf
    <div class=" row col-lg-12">
        @foreach ($permissions as $permission)
        <div class="col-lg-3" style="margin: 15px 0px;">
            <input type="checkbox"  
            @foreach ($hasPermissions as $per)
             {{ $per == $permission->id ? 'checked' : '' }}   
            @endforeach
            
            value="{{ $permission->id }}" name="permissions[]" id="{{ $permission->id }}">
            <label for="{{ $permission->id }}">{{ Str::ucfirst($permission->name )}}</label>
        </div> 
        @endforeach
    </div>
    <button class="btn btn-sm btn-primary" type="submit">Save Changes</button>
</form>

@endsection

