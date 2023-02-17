@extends('layouts.backendapp')
@section('backend_content')
<div class="row col-lg-12 mx-auto" style="border-bottom: 2px solid rgb(34, 38, 255);">
    <div class="card col-lg-6">
        <form action="{{ route('role.store') }}" method="post">
            @csrf
            <div class="card-body mt-1">
                <input class="form-control" name="permission_name" placeholder="Add permission..." type="text">
                    @error('role_name')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                <button class=" btn btn-sm form-control btn-primary mt-2">Add Permission</button>
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
                    <th class="text-nowrap text-center">PERMISSION NAME</th>
                    <th class="text-nowrap text-center">ACCESS</th>
                    <th class="text-nowrap text-center">STATUS</th>
                    <th class="text-center text-nowrap">ACTIONS</th>
                </tr>
            </thead>
            {{-- {{ dd($subcategories) }} --}}
            <tbody>
                @foreach ($permissions as $key=>$permission)
                <tr class="intro-x">
                    <td class="w-10">
                        <h1>{{ ++$key }}</h1>
                    </td>
                    <td class="text-center w-60 ">
                        <div style="margin:15px 0px; color:rgb(28, 63, 170);">
                            <label for="{{ $permission->id }}">{{ Str::ucfirst($permission->name) }}</label>
                        </div>
                    </td>
                    <td class="w-30">
                        <div class="d-flex align-items-center justify-content-center text-theme-9"> <small class="d-flex align-items-center text-theme-1"> Create a roll </small> </div>
                    </td>
                    <td class="w-40">
                        <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 me-2"></i> Active </div>
                    </td>
                    <td class="table-report__action w-40">
                        <div class=" btn-group d-flex justify-content-center align-items-center">
                            <a class="d-flex align-items-center me-3" href=""> <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                            <a href="#" class="d-flex align-items-center text-theme-6 deletebutton" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                            <form action="#" method="post">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

