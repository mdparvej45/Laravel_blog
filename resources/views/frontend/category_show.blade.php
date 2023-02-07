@extends('layouts.frontendapp')
@section('content')
<section class="page-header">
    <div class="container-xl">
        <div class="text-center">
            <h1 class="mt-0">{{ ucfirst($category->title) }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="category.html#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lifestyle</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
    	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">
                    <div class="row gy-4">
                        @forelse ($posts as $post)
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <a href="category.html" class="category-badge position-absolute" style="display: {{ $post->type == null ? 'none' : '' }};">{{ $post->type }}</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="{{ route('frontend.showpost', $post->slug) }}">
                                        <div class="inner">
                                            <img src="{{asset('/storage') . '/' . $post->images }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="category.html#"><img src="https://api.dicebear.com/5.x/initials/svg?seed={{ $post->user->name }}" style="border-radius: 50%; width:30px; height:30px;" class="author" alt="author"/>{{ $post->user->name }}</a></li>
                                        <li class="list-inline-item">{{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{ route('frontend.showpost', $post->slug) }}">{{ $post->title }}</a></h5>
                                    <p class="excerpt mb-0">{!! $post->detiles !!}</p>
                                </div>
                                <div class="post-bottom clearfix d-flex align-items-center">
                                    <div class="social-share me-auto">
                                        <button class="toggle-button icon-share"></button>
                                        <ul class="icons list-unstyled list-inline mb-0">
                                            <li class="list-inline-item"><a href="category.html#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a href="category.html#"><i class="fab fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="category.html#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li class="list-inline-item"><a href="category.html#"><i class="fab fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="category.html#"><i class="fab fa-telegram-plane"></i></a></li>
                                            <li class="list-inline-item"><a href="category.html#"><i class="far fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="more-button float-end">
                                        <a href="{{ route('frontend.showpost', $post->slug) }}"><span class="icon-options"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-sm-12">
                                <img src="{{ asset('frontend/images/not_found_img.jpg') }}" style="width: 50%; height:80%;" >
                            </div>
                        @endforelse

                    </div>                    
				</div>
				<div class="col-lg-4">
                    
                    <!-- sidebar -->
                    {{-- Frontend side ber her by include  --}}
                    @include('layouts.frontendsidebarapp')
				</div>

			</div>

		</div>
	</section>

	<!-- instagram feed -->
	<div class="instagram">
		<div class="container-xl">
			<!-- button -->
			<a href="category.html#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
			<!-- images -->
			<div class="instagram-feed d-flex flex-wrap">
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="category.html#">
						<img src="images/insta/insta-1.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="category.html#">
						<img src="images/insta/insta-2.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="category.html#">
						<img src="images/insta/insta-3.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="category.html#">
						<img src="images/insta/insta-4.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="category.html#">
						<img src="images/insta/insta-5.jpg" alt="insta-title" />
					</a>
				</div>
				<div class="insta-item col-sm-2 col-6 col-md-2">
					<a href="category.html#">
						<img src="images/insta/insta-6.jpg" alt="insta-title" />
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection