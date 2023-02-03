@extends('layouts.backendapp')
@section('backend_content')

<div class="content card">
    <h2 style="background-color: rgb(68, 68, 249); color:aliceblue;" class="intro-y fs-lg fw-medium mt-10 card-header">
        All Posts...
    </h2>
    <div class="grid columns-12 gap-6 mt-5 card-body">
        <!-- BEGIN: Data List -->
        <div class="intro-y g-col-12 overflow-auto overflow-lg-visible">
            <table class="table table-report mt-n2">
                <thead>
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th class="text-nowrap">TITLE</th>
                        <th class="text-center text-nowrap">DETILES</th>
                        <th class="text-center text-nowrap">STATUS</th>
                        <th class="text-center text-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($all_post as $key=>$post)
                    <tr class="intro-x">
                        <th class="w-10">
                            <h1>{{ ++$key }} </h1>
                        </th>
                        <td>
                            <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $post->title }}</a> 
                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5">{{ $post->slug }}</div>
                        </td>
                        <td class="text-center">
                            <h2>{{ $post->detiles }}</h2>
                        </td>
                        <td class="w-40">
                            <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="check-square" class="w-4 h-4 me-2"></i> Active </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class=" btn-group d-flex justify-content-center align-items-center">
                                <a class="d-flex align-items-center me-3" href=""> <i data-feather="check-square" class="w-4 h-4 me-1"></i> Edit </a>
                                <a href="#" class="d-flex align-items-center text-theme-6 deletebutton" > <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                                <form action="" method="post">
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
@endsection

{{-- Sweet alert section --}}
@push('sweetalert')
    <script>
    $('.deletebutton').click(function(){
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
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