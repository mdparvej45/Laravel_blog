<ul>
    {{-- Deshboard li is starting --}}
    <li>
        <a href=" {{ route('deshboard') }} " class=" side-menu {{ request()->routeIS('deshboard') ? 'side-menu side-menu--active side-menu--open' : '' }} ">
            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
            <div class="side-menu__title">
                Dashboard 
            </div>
        </a>
    </li>
    {{-- Banner is starting --}}
        <li>
            <a href="javascript:;" class=" side-menu {{ request()->routeIS('banner.*') ? 'side-menu--active side-menu--open' : '' }}">
                <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="side-menu__title">
                    Banner Section
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ request()->routeIS('banner.*') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="{{ route('banner.add') }}" class="side-menu side-menu--active side-menu--open">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">Banner Managment</div>
                    </a>
                </li>
            </ul>
        </li>
    {{-- Category li is starting --}}
    <li>
        <a href="javascript:;" class=" side-menu {{ request()->routeIS('category.*') ? 'side-menu--active side-menu--open' : '' }} ">
            <div class="side-menu__icon"> <i data-feather="codepen"></i> </div>
            <div class="side-menu__title">
                Catagory
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
        <ul class="{{ request()->routeIS('category.*') ? 'side-menu__sub-open' : '' }}">
            <li>
                <a href="{{ route('category.add') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                    <div class="side-menu__title"> Categories</div>
                </a>
            </li>
            <li>
                <a href="{{ route('category.subcategory.add') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                    <div class="side-menu__title"> Sub-Categories</div>
                </a>
            </li>
        </ul>
    </li>
    {{-- Post li is starting --}}
    <li>
        <a href="javascript:;" class=" side-menu {{ request()->routeIS('post.*') ? 'side-menu side-menu--active side-menu--open' : '' }} ">
            <div class="side-menu__icon"> <i data-feather="twitch"></i> </div>
            <div class="side-menu__title">
                Post Section
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
        <ul class="{{ request()->routeIS('post.*') ? 'side-menu__sub-open' : '' }}">
            <li>
                <a href="{{ route('post.add') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                    <div class="side-menu__title">Add Post</div>
                </a>
            </li>
            <li>
                <a href="{{ route('post.all') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                    <div class="side-menu__title"> Posts Managment</div>
                </a>
            </li>
        </ul>
    </li>
</ul>