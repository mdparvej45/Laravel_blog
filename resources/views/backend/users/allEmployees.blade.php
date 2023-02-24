@extends('layouts.backendapp')
@section('backend_content')

<div class="content card">
    <h2 style="background-color: rgb(68, 68, 249); color:aliceblue;" class="intro-y fs-lg fw-medium mt-10 card-header">
        ALL Staff...
    </h2>
    <div class="grid columns-12 gap-6 card-body">
        <!-- BEGIN: Data List -->
        <div class="intro-y g-col-12 overflow-auto overflow-lg-visible">
            <table class="table table-report mt-n2">
                <thead>
                    <tr>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap">IMAGE</th>
                        <th class="text-nowrap">NAME</th>
                        <th class="text-center text-nowrap">STATUS</th>
                        <th class="text-center text-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                {{-- {{ dd(Auth::user()) }} --}}
                <tbody>
                    @foreach ($users as $key=>$user)
                    <tr class="intro-x">
                        <td class="w-20">
                            <h1>{{ ++$key }}</h1>
                        </td>

                        <td class="w-20">
                            <img src="" style="width: 80px; height:50px; border-radius:5px; border:1px solid rgb(159, 159, 159)">
                        </td>
                        <td class="w-20">
                            <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $user->name . ' ' . $user->last_name }}</a> 
                            <div class="text-gray-600 fs-xs text-nowrap mt-0.5">{{ Str::ucfirst($user->roles[0]->name) }}</div>
                        </td>
                        <td class="w-30">
                            <div class="d-flex align-items-center justify-content-center {{ $user->status == 0 ? 'text-theme-6' : 'text-theme-9' }} ">{{ $user->status == 1 ? 'Right now user is active' : 'Right now user is Banned' }}</div>
                        </td>
                        <td class="table-report__action w-50">
                            @if ( $user->id == $authUser->id)
                            <a class="d-flex align-items-center text-theme-9 btn btn-sm p-2 ms-auto mt-auto" style="background-color:rgb(5, 87, 5);color:aliceblue;" href="#">ACTIVE ON THIS DEVICE</a>
                            @else
                            
                            @endif
                            <div class=" btn-group d-flex justify-content-center align-items-center">
                                <a style="{{ $user->id == $authUser->id ? 'visibility:hidden;' : ''}}" href="{{ route('users.bann', $user) }}" class="d-flex align-items-center {{ $user->status == 0 ? 'text-theme-9' : 'text-theme-6'}}  btn btn-sm" > <i data-feather="check-square" class="w-4 h-4 me-1"></i>{{ $user->status == 1 ? 'Bann' : 'Active'}}</a>
                                
                                <form action="" method="post">
                                    @csrf
                                    <a style="{{ $user->id == $authUser->id ? 'visibility:hidden;' : ''}}" class="d-flex align-items-center text-theme-6 deletebutton" > <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
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