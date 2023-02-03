@extends('layouts.backendapp')   
   
   @section('backend_content')
       
   {{-- Edit Category Section Starting Here --}}
    <div  class="col-lg-12 d-flex">
        <div class="col-lg-10 mx-auto mt-3">
            <div class="card-header col-lg-12 " style="background-color: rgb(63, 63, 237); color:white;">Edit Sub-Category</div>
            <div class=" mt-3 card-body col-lg-12 ">
                <form action="{{ route('category.update', $editedcategory) }}" method="POST">
                    @csrf
                    @method("PUT")
                        <label style="width: 100%;" for="title">Category Title:
                            <input class=" mt-3 form-control" value="{{ $editedcategory->title }}" style="width: 100%;" id="title" placeholder="Category title..." type="text" name="title">
                        </label>
                    <span class="text-theme-6">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                            <input class=" mt-3 form-control" style="width: 100%; display:none;" value="" id="slug" placeholder="Category slug (optional)" type="text" name="slug">
                    <button class="btn btn-primary btn-sm mt-3" name="update_category" type="submit">Save Change</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- Edit Category Section Ending Here --}}
   @endsection