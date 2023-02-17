@extends('layouts.backendapp')   
   
   @section('backend_content')
       
   {{-- Edit Category Section Starting Here --}}
    <div  class="col-lg-12 d-flex">
        <div style="border: 1px solid rgb(45, 45, 216);" class="col-lg-10 mx-auto mt-3">
            <div class="card-header col-lg-12 " style="background-color: rgb(45, 45, 216); color:white;">Edit Sub-Category</div>
            <div class=" mt-3 card-body col-lg-12 ">
                <form action="#" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="title col-lg-12">
                         <label for="category" class="form-control">
                            Main Category:
                            <select class="form-control" name="category_id" id="category">
                            @foreach ($categores as $item)
                            <option @selected($item->id == $data->category_id) value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                            </select>
                        </label>
                        <label style="width: 100%;" for="title">Sub-Category Title:
                            <input class=" mt-3 form-control" value="" style="width: 100%;" id="title" placeholder="Category title..." type="text" name="title">
                        </label>
                    </div>
                    <span class="text-theme-6">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="slug">
                        <label style="width: 100%;" for="slug">
                            Sub-Category Slug/Link:
                            <input class=" mt-3 form-control" style="width: 100%;" value="" id="slug" placeholder="Category slug (optional)" type="text" name="slug">
                        </label>
                    </div>
                    <span class="text-theme-6">
                        @error('slug')
                            {{ $message }}
                        @enderror
                    </span>
                    <button class="btn btn-primary btn-sm mt-3" name="update_category" type="submit">Save Change</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- Edit Category Section Ending Here --}}
   @endsection