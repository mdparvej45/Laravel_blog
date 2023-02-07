@extends('layouts.backendapp')
@section('backend_content')

<div class="content card">
    <h2 style="background-color: rgb(68, 68, 249); color:aliceblue;" class="intro-y fs-lg fw-medium mt-10 card-header">
        All Posts...
    </h2>
    <div class="grid columns-12 gap-6 card-body">
        <!-- BEGIN: Data List -->
        <div class="intro-y g-col-12 overflow-auto overflow-lg-visible">
            <table class="table table-report mt-n2">
                <thead>
                    <tr>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap">IMAGE</th>
                        <th class="text-nowrap">TITLE</th>
                        <th class="text-center text-nowrap">DETILES</th>
                        <th class="text-center text-nowrap">STATUS</th>
                        <th class="text-center text-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $key=>$post)
                    <tr class="intro-x">
                        <td class="w-10">
                            <h1>{{ ++$key }} </h1>
                        </td>
                        <td class="w-10">
                            <img src="{{ asset('storage/' . $post->images) }}" style="width: 80px; height:50px; border-radius:5px; border:1px solid rgb(159, 159, 159)">
                        </td>
                        <td>
                            <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $post->title }}</a> 
                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5">{{ $post->slug }}</div>
                        </td>
                        <td class="text-center">
                            <h2>
                                @if ($post->detiles > 15)
                                {{ substr($post->detiles ,0, 15 ) . '...' }}
                                @endif
                            </h2>
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
            <div class="row col-lg-12">
                {{ $pagination->links() }}
            </div>
        </div>
        <!-- END: Data List -->
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