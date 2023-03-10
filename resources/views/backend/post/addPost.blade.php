@extends('layouts.backendapp')
@section('backend_content')
       {{-- Add post Section Starting Here --}}
       <div class="col-lg-12 d-flex">
        <div class="col-lg-12 mx-auto mt-3">
            <div class="card-header" style="background-color: rgb(34, 34, 242); color:aliceblue;">Add Post</div>
            <div class="card-body">
                {{ dd(Auth::user()->permissions) }}
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div style="width: 33.33%" class="mb-3 category">
                            <select  class="form-control" name="category_id">
                                <option selected disabled>Select one</option>
                                @foreach ($categories as $category)     
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <span class="text-theme-6">
                                @error('category_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div style="width: 33.33%" class="mb-3 sub-category">
                            <select  class="form-control" name="sub_category_id">
                                <option selected disabled>Select one</option>
                                @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>   
                                @endforeach
                            </select>
                            <span class="text-theme-6">
                                @error('sub_category_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div style="width: 33.33%" class="mb-3 tranding">
                            <select  class="form-control" name="type">
                                <option selected disabled>Select one</option>
                                <option value="Tranding">Tranding</option>
                                <option value="Breaking News">Breaking News</option>
                                <option value="Hot Topic">Hot Topic</option>
                            </select>
                            <span class="text-theme-6">
                                @error('type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    
                    <div class="row" style="padding: 0px 10px; ">
                        <div class="title" style="width: 50%">
                            <input class="form-control mb-3" value="{{ old('title') }}" placeholder="Post title..." type="text" name="title" >
                            <span class="text-theme-6">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="slug" style="width: 50%">
                            <input class="form-control mb-3" value="{{ old('hash_tag') }}" placeholder="Type hash(optional)" type="text" name="hash_tag" >
                            <span class="text-theme-6">
                                @error('hash_tag')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <input class="form-control" type="text" name="slug" style="display: none;">
                    <div class="row mt-2">
                        <div class="textarea" style="width: 50%">
                            <textarea name="detiles" class="form-control mt-3 editor" cols="30" rows="10">{{ old('detiles') }}</textarea>
                            <span class="text-theme-6">
                                @error('detiles')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <label for="imagefile">
                                <input type="file" id="imagefile" style="visibility: hidden;" name="image" class="postImg">
                                <img class="liveImage" src="{{ asset('backend/dist/images/imageplaceholder.png') }}" alt="" style="height: 265px; width:430px;">
                            </label>
                            <p class="text-theme-6">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm mt-3" style="width: 100%;" type="submit">Post Submit</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Add Post Section Ending Here --}}
@endsection
@push('ekeditor_js')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.editor' ) )
        .catch( error => {
        } );
</script>

<script>

    let inputImg = document.querySelector('.postImg')
    let image = document.querySelector('.liveImage')

    let changeImage = (e) => {
        
    let url  = URL.createObjectURL(e.target.files[0])
    image.src = url
}


    inputImg.addEventListener('change', changeImage)

</script>

@endpush