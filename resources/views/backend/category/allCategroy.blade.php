@extends('layouts.backendapp')
@section('backend_content')

<div class="content">
    <h2 class="intro-y fs-lg fw-medium mt-10">
        All Categories...
    </h2>
    <div class="grid columns-12 gap-6 mt-5">
        <div class="intro-y g-col-12 d-flex flex-wrap flex-sm-nowrap align-items-center mt-2">
            <a href="{{ route('category.add') }}" class="btn btn-primary shadow-md me-2">Add Category</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark-text-gray-300" aria-expanded="false" data-bs-toggle="dropdown">
                    <span class="w-5 h-5 d-flex align-items-center justify-content-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-content">
                        <a href="side-menu-light-crud-data-list.html" class="dropdown-item"> <i data-feather="printer" class="w-4 h-4 me-2"></i> Print </a>
                        <a href="side-menu-light-crud-data-list.html" class="dropdown-item"> <i data-feather="file-text" class="w-4 h-4 me-2"></i> Export to Excel </a>
                        <a href="side-menu-light-crud-data-list.html" class="dropdown-item"> <i data-feather="file-text" class="w-4 h-4 me-2"></i> Export to PDF </a>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
            <div class="w-full w-sm-auto mt-3 mt-sm-0 ms-sm-auto ms-md-0">
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y g-col-12 overflow-auto overflow-lg-visible">
            <table class="table table-report mt-n2">
                <thead>
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th class="text-nowrap">TITLE</th>
                        <th class="text-center text-nowrap">VIEW</th>
                        <th class="text-center text-nowrap">STATUS</th>
                        <th class="text-center text-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fetch as $key=>$data)
                    <tr class="intro-x">
                        <th class="w-10">
                            <h1>{{ ++$key }} </h1>
                        </th>
                        <td>
                            <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $data->title }}</a> 
                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5">{{ $data->slug }}</div>
                        </td>
                        <td class="text-center">
                            <h2>{{ $data->id }}</h2>
                        </td>
                        <td class="w-40">
                            <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 me-2"></i> Active </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class=" btn-group d-flex justify-content-center align-items-center">
                                <a class="d-flex align-items-center me-3" href="{{ route('category.edit',$data)}}"> <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                                <a class="d-flex align-items-center text-theme-6" href="javascript:;" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
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
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                        <div class="fs-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">
                            Do you really want to delete these records? 
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary w-24 me-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
@endsection