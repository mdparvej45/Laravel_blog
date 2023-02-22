@extends('layouts.backendapp')
@section('backend_content')
    <div class="row col-lg-12 mx-auto" style="border-bottom: 2px solid rgb(34, 38, 255);">
        <div class="card col-lg-6">
            <form action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="card-body mt-1">
                    <input class="form-control" name="role_name" placeholder="Add role..." type="text">
                        @error('role_name')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                    <button class=" btn btn-sm form-control btn-primary mt-2">Add Role</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row col-lg-12 mx-auto">
        <div class="intro-y overflow-hidden overflow-lg-hidden">
            <table class="table table-report mt-n2">
                <thead>
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th class="text-nowrap text-center">ROLE NAME</th>
                        <th class="text-nowrap text-center">HAS PERMISSIONS</th>
                        <th class="text-nowrap text-center">STATUS</th>
                        <th class="text-center text-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                {{-- {{ dd($subcategories) }} --}}
                <tbody>
                    @forelse ($roles as $key=>$role)
                    <tr class="intro-x">
                        <td class="w-10">
                            <h1>{{ ++$key }}</h1>
                        </td>
                        <td class="text-center w-40">
                            <h2>{{ Str::ucfirst(str_replace('-', ' ', $role->name)) }}</h2>
                        </td>
                        <td class="w-40">
                            <div class="d-flex align-items-center justify-content-center text-theme-9"> <a href="{{ route('permission.assign', $role) }}" class="d-flex align-items-center text-theme-1 deletebutton" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"> <i data-feather="key" class="w-4 h-4 me-1"></i> Permission </a> </div>
                        </td>
                        <td class="w-40">
                            {{-- This section access to need role status permission --}}
                            @can('role status')
                            <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 me-2"></i> Active </div> 
                            @endcan
                        </td>
                        <td class="table-report__action w-40">
                            <div class=" btn-group d-flex justify-content-center align-items-center">
                                {{-- This section access to need role edit permission --}}
                                @can('role edit')
                                <a class="d-flex align-items-center me-3" href="{{ route('role.edit', $role) }}"> <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                                @endcan
                                <a href="#" class="d-flex align-items-center text-theme-6 deletebutton" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                                <form action="#" method="post">
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr class="intro-x">
                            <td class="rowspan">
                                <h4>No data found...</h4>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection