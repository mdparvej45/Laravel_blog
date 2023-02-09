
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Katen - Minimal Blog & Magazine HTML Theme</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

	<!-- STYLES -->
	<link rel="stylesheet" href=" {{ asset('frontend/css/bootstrap.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href=" {{ asset('frontend/css/all.min.css')}} " type="text/css" media="all">
	<link rel="stylesheet" href=" {{ asset('frontend/css/slick.css')}} " type="text/css" media="all">
	<link rel="stylesheet" href=" {{ asset('frontend/css/simple-line-icons.css')}} " type="text/css" media="all">
	<link rel="stylesheet" href=" {{ asset('frontend/css/style.css')}} " type="text/css" media="all">

</head>

<body>

	<body>

		<!-- preloader -->
		{{-- <div id="preloader">
			<div class="book">
				<div class="inner">
					<div class="left"></div>
					<div class="middle"></div>
					<div class="right"></div>
				</div>
				<ul>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		</div> --}}
		
		<!-- site wrapper -->
		<div class="site-wrapper">
		
			<div class="main-overlay"></div>
			<!-- header -->
			<header class="header-default">
				<nav class="navbar navbar-expand-lg">
					<div class="container-xl">
						<!-- site logo -->
						<a class="navbar-brand" href="{{ route('frontend.index') }}"><img src="{{asset('frontend/images/logo.svg')}}" alt="logo" /></a> 
		
						<div class="collapse navbar-collapse">
							<!-- menus -->
							<ul class="navbar-nav mr-auto">
								<li class="nav-item  active">
									<a class="nav-link " href="{{ route('frontend.index') }}">Home</a>
								</li>
								@foreach ($categories as $category)
								<li class="nav-item {{ count($category->subcategories) > 0 ? 'dropdown' : '' }}">

									<a class="nav-link {{ count($category->subcategories) > 0 ? 'dropdown-toggle' : '' }} " href="{{ route('frontend.category', $category) }}">{{ $category->title }}</a>
									@if (count($category->subcategories) > 0)
									<ul class="dropdown-menu">
											@foreach ($category->subcategories as $subcategory)	
											<li><a class="dropdown-item" href="{{ route('frontend.subcategory', $subcategory) }}">{{ $subcategory->title }}</a></li>
											@endforeach
										</ul>
									@endif
								</li>
								@endforeach
								@auth
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#">Profile</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="{{route('deshboard')}}">Deshboard</a></li>
										<li><a class="dropdown-item" href="blog-single.html">Change Password</a></li>
										<li><a href="{{ route('logout') }}" class="dropdown-item">Logout</a></li>
									</ul>
								</li>

								@else
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#">Account</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href=" {{route('login')}} ">Login</a></li>
										<li class="nav-item">
											<a class="nav-link" href="{{route('register')}}"><small>Request | <span>Singup</span></small></a>
										</li>
									</ul>
								</li>
								@endauth
							</ul>
						</div>
		
						<!-- header right section -->
						<div class="header-right">
							<!-- social icons -->
							<ul class="social-icons list-unstyled list-inline mb-0">
								<li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
								<li class="list-inline-item"><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
								<li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
								<li class="list-inline-item"><a href="index.html#"><i class="fab fa-medium"></i></a></li>
								<li class="list-inline-item"><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
							</ul>
							<!-- header buttons -->
							<div class="header-buttons">
								<button class="search icon-button">
									<i class="icon-magnifier"></i>
								</button>
								<button class="burger-menu icon-button">
									<span class="burger-icon"></span>
								</button>
							</div>
						</div>
					</div>
				</nav>
			</header>


            @yield('content')

            			<!-- instagram feed -->
			<div class="instagram">
				<div class="container-xl">
					<!-- button -->
					<a href="index.html#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
					<!-- images -->
					<div class="instagram-feed d-flex flex-wrap">
						<div class="insta-item col-sm-2 col-6 col-md-2">
							<a href="index.html#">
								<img src="images/insta/insta-1.jpg" alt="insta-title" />
							</a>
						</div>
						<div class="insta-item col-sm-2 col-6 col-md-2">
							<a href="index.html#">
								<img src="images/insta/insta-2.jpg" alt="insta-title" />
							</a>
						</div>
						<div class="insta-item col-sm-2 col-6 col-md-2">
							<a href="index.html#">
								<img src="images/insta/insta-3.jpg" alt="insta-title" />
							</a>
						</div>
						<div class="insta-item col-sm-2 col-6 col-md-2">
							<a href="index.html#">
								<img src="images/insta/insta-4.jpg" alt="insta-title" />
							</a>
						</div>
						<div class="insta-item col-sm-2 col-6 col-md-2">
							<a href="index.html#">
								<img src="images/insta/insta-5.jpg" alt="insta-title" />
							</a>
						</div>
						<div class="insta-item col-sm-2 col-6 col-md-2">
							<a href="index.html#">
								<img src="images/insta/insta-6.jpg" alt="insta-title" />
							</a>
						</div>
					</div>
				</div>
			</div>
		
			<!-- footer -->
			<footer>
				<div class="container-xl">
					<div class="footer-inner">
						<div class="row d-flex align-items-center gy-4">
							<!-- copyright text -->
							<div class="col-md-4">
								<span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
							</div>
		
							<!-- social icons -->
							<div class="col-md-4 text-center">
								<ul class="social-icons list-unstyled list-inline mb-0">
									<li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
									<li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
									<li class="list-inline-item"><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
									<li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
									<li class="list-inline-item"><a href="index.html#"><i class="fab fa-medium"></i></a></li>
									<li class="list-inline-item"><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</div>
		
							<!-- go to top button -->
							<div class="col-md-4">
								<a href="index.html#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
							</div>
						</div>
					</div>
				</div>
			</footer>
		
		</div><!-- end site wrapper -->
		
		<!-- search popup area -->
		<div class="search-popup">
			<!-- close button -->
			<button type="button" class="btn-close" aria-label="Close"></button>
			<!-- content -->
			<div class="search-content">
				<div class="text-center">
					<h3 class="mb-4 mt-0">Press ESC to close</h3>
				</div>
				<!-- form -->
				<form class="d-flex search-form">
					<input class="form-control me-2" name="search_text" id="searchInput" type="search" placeholder="Search and press enter ..." aria-label="Search">
					<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
				</form>
				<ul style="list-style: none; text-decoration-none;" id="searchItme">
					
				</ul>
			</div>
		</div>
		
		<!-- canvas menu -->
		<div class="canvas-menu d-flex align-items-end flex-column">
			<!-- close button -->
			<button type="button" class="btn-close" aria-label="Close"></button>
		
			<!-- logo -->
			<div class="logo">
				<img src="images/logo.svg" alt="Katen" />
			</div>
		
			<!-- menu -->
			<nav>
				<ul class="vertical-menu">
					<li class="active">
						<a href="index.html">Home</a>
						<ul class="submenu">
							<li><a href="index.html">Magazine</a></li>
							<li><a href="personal.html">Personal</a></li>
							<li><a href="personal-alt.html">Personal Alt</a></li>
							<li><a href="minimal.html">Minimal</a></li>
							<li><a href="classic.html">Classic</a></li>
						</ul>
					</li>
					<li><a href="category.html">Lifestyle</a></li>
					<li><a href="category.html">Inspiration</a></li>
					<li>
						<a href="index.html#">Pages</a>
						<ul class="submenu">
							<li><a href="category.html">Category</a></li>
							<li><a href="blog-single.html">Blog Single</a></li>
							<li><a href="blog-single-alt.html">Blog Single Alt</a></li>
							<li><a href="about.html">About</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		
			<!-- social icons -->
			<ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
				<li class="list-inline-item"><a href="index.html#"><i class="fab fa-facebook-f"></i></a></li>
				<li class="list-inline-item"><a href="index.html#"><i class="fab fa-twitter"></i></a></li>
				<li class="list-inline-item"><a href="index.html#"><i class="fab fa-instagram"></i></a></li>
				<li class="list-inline-item"><a href="index.html#"><i class="fab fa-pinterest"></i></a></li>
				<li class="list-inline-item"><a href="index.html#"><i class="fab fa-medium"></i></a></li>
				<li class="list-inline-item"><a href="index.html#"><i class="fab fa-youtube"></i></a></li>
			</ul>
		</div>

<!-- JAVA SCRIPTS -->
<script src=" {{ asset('frontend/js/jquery.min.js')}} "></script>
<script src=" {{ asset('frontend/js/popper.min.js')}} "></script>
<script src=" {{ asset('frontend/js/bootstrap.min.js')}} "></script>
<script src=" {{ asset('frontend/js/slick.min.js')}} "></script>
<script src=" {{ asset('frontend/js/jquery.sticky-sidebar.min.js')}} "></script>
<script src=" {{ asset('frontend/js/custom.js')}} "></script>
<script>
	$('#searchInput').on('keyup', function(){
	let value = $(this).val()
	if(value.length > 2){
		$.ajax({
			methos: "get",
			url: "{{ route('frontend.search.live') }}",
			data: {searchText: value},
			success: function(data){
				let results = JSON.parse(data);
				let posts = []
				results.forEach(result => {
					// console.table(result['slug'])
					let url = `{{route('frontend.showpost', ':slug')}}`;
					url = url.replace(':slug', result.slug)
					console.log(url);
					let searchResult = `
					<li style="margin-top:20px; align-items:center; border-bottom:1px solid gray;" class="py-1">
							<a href="${url}">
								<div class="row align-items-center col-lg-12">
									<div class="col-lg-3">
										<img style="width: 90%; height:80%;" src="{{ asset('storage/') . '/'}}${result.images}" alt="">
									</div>
									<div class="card-body col-lg-9">
										<h5>${result.title}</h5>
										
									</div>
								</div>
							</a>
						</li>`;
						posts.push(searchResult)
				});
				$('#searchItme').html(posts)
			}
		});
	}else{
		$('#searchItme').html('');
	}
	})
</script>
{{-- <script>
	$(document).ready(function(){
		$('#searchInput').keyup(function(){
			var search = $('#searchInput').val();
			// console.log(search);
			if(search == ""){
				$("#memList").html("");
				$("result").hide();
			}else{
				$.get("{{ URL::to('search') }}", {search:search}, function(){
					$('#memList').empty().html(data);
					$('#result').show();
				})	
			}
		});
	});
</script> --}}

</body>
</html>