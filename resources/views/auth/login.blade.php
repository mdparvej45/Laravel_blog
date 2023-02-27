<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Rubick admin is super flexible, powerful, clean & modern responsive bootstrap admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard - Rubick - Bootstrap HTML Admin Template</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href=" {{asset('backend/dist/css/app.css')}} "/>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container px-sm-10">
            <div class="grid columns-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="g-col-2 g-col-xl-1 d-none d-xl-flex flex-column min-vh-screen">
                    <a href="login-light-login.html" class="-intro-x d-flex align-items-center pt-5">
                        <span class="fs-4xl text-white fw-medium lh-1">Katen<span class="fw-medium text-theme-6">.</span> </span>
                        <span class="fs-4xl text-black fw-medium lh-1"> Desh<span class="fw-medium">board</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Rubick Bootstrap HTML Admin Template" class="-intro-x w-1/2 mt-n16" src=" {{asset('backend/dist/images/illustration.svg')}} ">
                        <div class="-intro-x text-white fw-medium fs-4xl lh-base mt-10">
                            A few more clicks to 
                            <br>
                            sign in to your account.
                        </div>
                        <div class="-intro-x mt-5 fs-lg text-white text-opacity-70 dark-text-gray-500">Manage all your e-commerce accounts in one place</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="g-col-2 g-col-xl-1 h-screen h-xl-auto d-flex py-5 py-xl-0 my-10 my-xl-0">
                    <div class="my-auto mx-auto ms-xl-20 bg-white dark-bg-dark-1 bg-xl-transparent px-5 px-sm-8 py-8 p-xl-0 rounded-2 shadow-md shadow-xl-none w-full w-sm-3/4 w-lg-2/4 w-xl-auto">
                        <h2 class="intro-x fw-bold fs-2xl fs-xl-3xl text-center text-xl-start">
                            Sign In
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 d-xl-none text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <form action=" {{route('login')}} " method="post">
                            @csrf
                        <div class="intro-x mt-8">
                            <input type="text" value="{{old('email')}}" name="email" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block" placeholder="Email">
                            @error('email')
                                <span class="text-theme-6"> {{$message}} </span>                                
                            @enderror
                            <input type="password" name="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 d-block mt-4" placeholder="Password">
                            @error('password')
                            <span class="text-theme-6"> {{$message}} </span>                                
                        @enderror
                        </div>
                        <div class="intro-x d-flex text-gray-700 dark-text-gray-600 fs-xs fs-sm-sm mt-4">
                            <div class="d-flex align-items-center me-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border me-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href=" {{route('password.request')}} ">Forgot Password?</a> 
                        </div>
                        <div class="intro-x mt-5 mt-xl-8 text-center text-xl-start">
                            <button class="btn btn-primary py-3 px-4 w-full w-xl-32 me-xl-3 align-top">Login</button>
                        </form>
                            <a href=" {{route('register')}} " class="btn btn-outline-secondary py-3 px-4 w-full w-xl-32 mt-3 mt-xl-0 align-top">Sign up</a>
                        </div>
                        <div class=" d-flex col-lg-6 mt-5">
                            <a href="{{ route('google.login') }}" class="btn btn-sm" ><img style="height: 40px; width:40px;border:1px solid blue; border-radius:50%;" src="{{ asset('backend/dist/images/google_icon.png') }}" alt=""><span style="margin: 5px;">Google</span></a>
                            <a href="{{ route('facebook.login') }}" class="btn btn-sm" ><img style="height: 40px; width:40px;border:1px solid blue; border-radius:50%;" src="{{ asset('backend/dist/images/facebook_icon.png') }}" alt=""><span style="margin: 5px;">Facebook</span></a>
                            <a href="{{ route('github.login') }}" class="btn btn-sm" ><img style="height: 40px; width:40px;border:1px solid blue; border-radius:50%;" src="{{ asset('backend/dist/images/github_icon.png') }}" alt=""><span style="margin: 5px;">Github</span></a>
                        </div>
                        <div class="intro-x mt-5 mt-xl-24 text-gray-700 dark-text-gray-600 text-center text-xl-start">
                            By signin up, you agree to our 
                            <br>
                            <a class="text-theme-1 dark-text-theme-10" href="#">Terms and Conditions</a> & <a class="text-theme-1 dark-text-theme-10" href="#">Privacy Policy</a> 
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- END: Dark Mode Switcher-->
        <!-- BEGIN: JS Assets-->
        <script src=" {{asset('backend/dist/js/app.js')}} "></script>
        <!-- END: JS Assets-->
        <script data-pagespeed-no-defer src="{{ asset('backend/dist/js/svg.js') }}"></script></body>
</html>