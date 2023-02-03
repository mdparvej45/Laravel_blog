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
<div class="card col-lg-12">
    <div class="card-header d-flex" style="background-color: rgb(39, 85, 236)">
        <div class="col-lg-5 mx-auto">
            <div class="card-header" style="color: rgb(255, 255, 255);">Select Category</div>
            <div>
                {{-- {{ dd($category) }} --}}
                <form action="{{ route('category.subcategory.store') }}" method="POST">
                    @csrf
                    <select style="color: rgb(210, 210, 210)" name="category_id"   class="mt-2 form-control">
                        <option disabled selected> Select one</option>
                        @foreach ($category as $data)
                        <option style="color: rgb(0, 0, 0)" value="{{ $data->id }}" class="form-control" > {{ $data->title }} </option>
                        @endforeach
                    </select>
                    <span style="color: rgb(210, 210, 210)">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </span>
            </div>
        </div>
        
         {{-- Add Category Section Starting Here --}}
        <div class="col-lg-6 mx-auto">
            <div class="card-header" style="color: rgb(255, 255, 255);">Add Sub-Category</div>
                <div>
                @csrf
                <input class=" mt-2 form-control" name="title" value="{{ old('title') }}" placeholder="Sub Category title..." type="text" name="title">
                <span style="color: rgb(210, 210, 210)">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
                <input class=" mt-3 form-control" style="display:none;" name="slug" value="{{ old('slug') }}" placeholder="Sub Category slug (optional)" type="text" name="slug">
                <button class="btn btn-primary btn-sm mt-3" style="width: 100%; color: blue; background-color: rgb(255, 255, 255);" type="submit">Add Sub-Category</button>
            </div>
        </div>{{-- Add Category Section Ending Here --}}
    </div>
    </form>
<div class="card-body">
    <div class="card col-lg-12 mx-auto mt-2">
        <div class="card-header" style="color: blue;"> All Sub categories</div>
        <div class="">
            <div class="">
                {{-- {{ dd($category) }} --}}

                <div class="">
                    <!-- BEGIN: Data List -->
                    <div class="intro-y overflow-hidden overflow-lg-hidden">
                        <table class="table table-report mt-n2">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">ID</th>
                                    <th class="text-nowrap">TITLE</th>
                                    <th class="text-center text-nowrap">MAIN CATEGORY</th>
                                    <th class="text-nowrap">STATUS</th>
                                    <th class="text-center text-nowrap">ACTIONS</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse ($subcategorries as $key=>$subcategory)
                                <tr class="intro-x">
                                    <th class="w-10">
                                        <h1>{{ ++$key }}</h1>
                                    </th>
                                    <td>
                                        <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $subcategory->title }}</a> 
                                        <div class="text-gray-600 fs-xs text-nowrap mt-0.5">{{ $subcategory->slug }}</div>
                                    </td>
                                    <td class="text-center">
                                        <h2>{{ $subcategory->category->title }}</h2>
                                    </td>
                                    <td class="w-40">
                                        <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 me-2"></i> Active </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class=" btn-group d-flex justify-content-center align-items-center">
                                            <a class="d-flex align-items-center me-3" href="{{ route('category.subcategory.edit', $subcategory) }}"> <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                                            <a href="#" class="d-flex align-items-center text-theme-6 deletebutton" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                                            <form action="{{ route('category.subcategory.delete', $subcategory) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"><h1>No Record Found...</h1></td>
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
            </div>
        </div>
    </div>
</div>
</div>
@endsection

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