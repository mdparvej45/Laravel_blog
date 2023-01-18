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
    {{-- Category li is starting --}}
    <li>
        <a href="javascript:;" class=" side-menu {{ request()->routeIS('category.*') ? 'side-menu side-menu--active side-menu--open' : '' }} ">
            <div class="side-menu__icon"> <i data-feather="codepen"></i> </div>
            <div class="side-menu__title">
                Catagfry
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
        <ul class="side-menu__sub-open">
            <li>
                <a href="{{ route('category.add') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                    <div class="side-menu__title"> Categories </div>
                </a>
            </li>
            <li>
                <a href="{{ route('category.store') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                    <div class="side-menu__title"> Category Managment </div>
                </a>
            </li>
        </ul>
    </li>
</ul>