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
@canany(['role_create', 'role_edit', 'role_status', 'role_delete', 'permission_create', 'permission_edit', 'permission_status', 'permission_delete'])
{{-- Role and permission is starting --}}
<li>
    <a href="javascript:;" class=" side-menu {{ request()->routeIS('role.*') ? 'side-menu--active side-menu--open' : '' }}">
        <div class="side-menu__icon"> <i data-feather="slack"></i> </div>
        <div class="side-menu__title">
            Roles & Permissions
            <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{ request()->routeIS('role.*') ? 'side-menu__sub-open' : '' }}">
        <li>
            <a href="{{ route('role.add') }}" class="side-menu side-menu--active side-menu--open">
                <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                <div class="side-menu__title">Roles</div>
            </a>
        </li>
        <li>
            <a href="{{ route('permission.add') }}" class="side-menu side-menu--active side-menu--open">
                <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                <div class="side-menu__title">Permissions</div>
            </a>
        </li>
    </ul>
</li>  
@endcanany
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
                        <div class="side-menu__icon"> <i data-feather="credit-card"></i> </div>
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
            {{-- This section access to need category create edit --}}
            @can('category edit')
            <li>
                <a href="{{ route('category.add') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="edit-2"></i> </div>
                    <div class="side-menu__title"> Categories</div>
                </a>
            </li>
            @endcan
            <li>
                <a href="{{ route('category.subcategory.add') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="edit-3"></i> </div>
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
                    <div class="side-menu__icon"> <i data-feather="file-plus"></i> </div>
                    <div class="side-menu__title">Add Post</div>
                </a>
            </li>
            <li>
                <a href="{{ route('post.all') }}" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                    <div class="side-menu__title"> Posts Managment</div>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class=" side-menu {{ request()->routeIS('users.*') ? 'side-menu side-menu--active side-menu--open' : '' }} ">
            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
            <div class="side-menu__title">
                User Managment
                <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
            </div>
        </a>
        <ul class="{{ request()->routeIS('users.*') ? 'side-menu__sub-open' : '' }}">
            <li>
                <a href="javascript:;" class=" side-menu {{ request()->routeIS('users.*') ? 'side-menu side-menu--active side-menu--open' : '' }} ">
                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="side-menu__title">
                        Employees
                        <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                    </div>
                </a>
                <ul class="{{ request()->routeIS('users.*') ? 'side-menu__sub-open' : '' }}"> 
                    <li>
                        <a href="{{ route('users.add') }}" class="side-menu side-menu--active side-menu--open">
                            <div class="side-menu__icon"> <i data-feather="user-plus"></i> </div>
                            <div class="side-menu__title">Add Employee </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.all') }}" class="side-menu side-menu--active side-menu--open">
                            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="side-menu__title">Employees </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="side-menu side-menu--active side-menu--open">
                    <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                    <div class="side-menu__title">Others</div>
                </a>
            </li>
        </ul>
    </li> 
</ul>