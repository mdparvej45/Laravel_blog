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
{{-- @if({{ Session::has('massagewarning') }})
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
@endif --}}

{{-- Adding towst for update and warning --}}

<div class="col-lg-12">
    {{-- Add Category Section Starting Here --}}
    <div class="col-lg-12 mx-auto" style="background-color: rgb(56, 102, 253)">
        <div class="card-header" style="color: white">Add Banner</div>
        <div class=" row card-body">
            <div class="col-lg-6">
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input class=" form-control" type="file" name="banner_image">
                    <span style="color: white;">
                        @error('banner_image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-lg-6">
                    <input class=" form-control" value="{{ old('title') }}" placeholder="Banner title..." type="text" name="title">
                    <span style="color: white;">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <input class=" mt-1 form-control" style="display:none;" value="{{ old('slug') }}" type="text" name="slug">
                <span style="color: white;">
                    @error('slug')
                        {{ $message }}
                    @enderror
                </span>
                <button class="btn btn-primary btn-sm mt-3" style="width: 100%;background-color: rgb(255, 255, 255); color:blue;" name="add_category" type="submit">Add Banner</button>
            </form>
        </div>
    </div>{{-- Add Category Section Ending Here --}}

    <div class="card-header col-lg-12">
        <div class=" mx-auto">
            <div class="card-header" style="color: blue;"> All Banners</div>
            <div class="card-body">
                <div class="">
                    <div class="">
                        <!-- BEGIN: Data List -->
                        <div class="intro-y overflow-hidden overflow-lg-hidden">
                            <table class="table table-report">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">ID</th>
                                        <th class="text-nowrap">IMAGE</th>
                                        <th class="text-nowrap">TITLE</th>
                                        <th class="text-nowrap">STATUS</th>
                                        <th class="text-center text-nowrap">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($banner_posts as $key=>$banner)
                                    <tr class="intro-x">
                                        <td class="w-10">
                                            <h1>{{ ++$key }}</h1>
                                        </td>
                                        <td class="w-10">
                                           <img style="width: 80px; height:50px; " src="{{ asset('storage/') . '/' . $banner->banner_image }}" alt="{{ $banner->slug }}">
                                        </td>
                                        <td>
                                            <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $banner->title }}</a> 
                                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5">{{ $banner->slug }}</div>
                                        </td>
                                        <td class="w-40">
                                            <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 me-2"></i> Active </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class=" btn-group d-flex justify-content-center align-items-center">
                                                <a class="d-flex align-items-center me-3" href=""> <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                                                <a href="#" class="d-flex align-items-center text-theme-6 deletebutton" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                                                <form action="" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                       <tr>
                                        <h4>No Record Found...</h4>
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