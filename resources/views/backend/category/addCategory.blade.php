@extends('layouts.backendapp')
@section('backend_content')
{{-- @if(session()->has('message'))
<div class="col-lg-4">
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center mb-2" role="alert">
        <i data-feather="alert-octagon" class="w-6 h-6 me-2"></i> {{ $message }} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x" class="w-4 h-4"></i> </button>
    </div>
</div> 
@endif --}}

{{-- Adding towst for update and warning --}}
@if( Session::has('massagewarning'))
<div class="show toast " role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small class="text-muted">11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" style="background-color: red; color:aliceblue;">
      {{ Session::get('messagewarning') }}
    </div>
</div>
@else
<div class="show toast " role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <small class="text-muted">11 mins ago</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" style="background-color: rgb(0, 142, 36); color:aliceblue;">
      {{ Session::get('message') }}
    </div>
</div>
@endif

{{-- Adding towst for update and warning --}}

<div class="col-lg-12">
    {{-- This section access to need category create permission --}}
    @can('category create')
        {{-- Add Category Section Starting Here --}}
        <div class="col-lg-12 mx-auto" style="background-color: rgb(56, 102, 253)">
            <div class="card-header" style="color: white">Add Category</div>
            <div class=" card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <input class=" form-control" value="{{ old('title') }}" placeholder="Category title..." type="text" name="title">
                    <span class="text-theme-6">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                    <input class=" mt-1 form-control" style="display:none;" value="{{ old('slug') }}" placeholder="Category slug (optional)" type="text" name="slug">
                    <span class="text-theme-6">
                        @error('slug')
                            {{ $message }}
                        @enderror
                    </span>
                    <button class="btn btn-primary btn-sm mt-3" style="width: 100%;background-color: rgb(255, 255, 255); color:blue;" name="add_category" type="submit">Add Category</button>
                </form>
            </div>
        </div>{{-- Add Category Section Ending Here --}}  
    @endcan

    <div class="card-header col-lg-12">
        <div class=" mx-auto">
            <div class="card-header" style="color: blue;"> All Sub categories</div>
            <div class="card-body">
                <div class="">
                    <div class="">
                        <!-- BEGIN: Data List -->
                        <div class="intro-y overflow-hidden overflow-lg-hidden">
                            <table class="table table-report mt-n2">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">ID</th>
                                        <th class="text-nowrap">TITLE</th>
                                        <th class="text-center text-nowrap">SLUG/LINK</th>
                                        <th class="text-nowrap">STATUS</th>
                                        <th class="text-center text-nowrap">ACTIONS</th>
                                    </tr>
                                </thead>
                                {{-- {{ dd($subcategories) }} --}}
                                <tbody>
                                    @forelse ($fetch as $key=>$data)
                                    <tr class="intro-x">
                                        <th class="w-10">
                                            <h1> {{ ++$key }}</h1>
                                        </th>
                                        <td>
                                            <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $data->title }}</a> 
                                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5"></div>
                                        </td>
                                        <td class="text-center">
                                            <h2>{{ $data->slug }}</h2>
                                        </td>
                                        <td class="w-40">
                                            <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 me-2"></i> Active </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class=" btn-group d-flex justify-content-center align-items-center">
                                                {{-- This section access to need create edit permission --}}
                                                @can('category edit')
                                                    <a class="d-flex align-items-center me-3" href="{{ route('category.edit', $data) }}"> <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                                                @endcan
                                                {{-- This section access to need create delete permission --}}
                                                @can('category delete')
                                                <a href="#" class="d-flex align-items-center text-theme-6 deletebutton" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                                                @endcan
                                                <form action="{{ route('category.delete', $data) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th class="colspan">No Record....</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- END: Data List -->
                        <!-- BEGIN: Pagination -->
                        <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-row flex-sm-nowrap align-items-center">
                            <nav class="w-full w-sm-auto me-sm-auto">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="side-menu-light-crud-data-list.html#"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="side-menu-light-crud-data-list.html#"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
                                    </li>
                                    <li class="page-item"> <a class="page-link" href="side-menu-light-crud-data-list.html#">...</a> </li>
                                    <li class="page-item"> <a class="page-link" href="side-menu-light-crud-data-list.html#">1</a> </li>
                                    <li class="page-item active"> <a class="page-link" href="side-menu-light-crud-data-list.html#">2</a> </li>
                                    <li class="page-item"> <a class="page-link" href="side-menu-light-crud-data-list.html#">3</a> </li>
                                    <li class="page-item"> <a class="page-link" href="side-menu-light-crud-data-list.html#">...</a> </li>
                                    <li class="page-item">
                                        <a class="page-link" href="side-menu-light-crud-data-list.html#"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="side-menu-light-crud-data-list.html#"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
                                    </li>
                                </ul>
                            </nav>
                            <select class="w-20 form-select box mt-3 mt-sm-0">
                                <option>10</option>
                                <option>25</option>
                                <option>35</option>
                                <option>50</option>
                            </select>
                        </div>
                        <!-- END: Pagination -->
                    </div>
                        <!-- BEGIN: Delete Confirmation Modal -->
                        </div>
                        </div>
                    <!-- END: Delete Confirmation Modal -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- Sweert alert section --}}
@push('sweetalert')
    <script>
    $('.deletebutton').click(function(){
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#0000FF',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $(this).next('form').submit();
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

    })

    </script>
@endpush