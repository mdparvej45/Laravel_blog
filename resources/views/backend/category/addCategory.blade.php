@extends('layouts.backendapp')
@section('backend_content')
<div class="col-lg-6">
    <div class="card"></div>
    <div class="card-header">Add Category</div>
    <div class=" mt-3 card-body">
        <form class="form-control" action="{{ route('category.store') }}" method="POST">
            @csrf
            <input class=" mt-3 form-control" value="{{ old('title') }}" placeholder="Category title..." type="text" name="title">
            <span class="text-theme-6">
                @error('title')
                    {{ $message }}
                @enderror
            </span>
            <input class=" mt-3 form-control" placeholder="Category slug (optional)" type="text" name="slug">
            <button class="btn btn-primary btn-sm mt-3" type="submit">Add Category</button>
        </form>
    </div>
</div>
</div>

@endsection