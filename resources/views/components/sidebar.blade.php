@php
    function setActive($route)
    {
        return request()->is($route) ? 'active' : '';
    }
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ asset('img/pt.jpg') }}" style="width: 40px;" alt="">
            <a href="{{ route('admin.dashboard.index') }}" class="fw-bold" style="letter-spacing: 2px">PT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard.index') }}">
                <img src="{{ asset('img/pt.jpg') }}" style="width: 40px" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header text-capitalize">Main Menu</li>
            <li class="nav-item {{ setActive('admin/dashboard') }}">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i
                        class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            @can('posts.index')
                <li class="nav-item {{ setActive('admin/post*') }}">
                    <a href="{{ route('admin.post.index') }}" class="nav-link"><i
                            class="fas fa-book-open"></i><span>Posts</span></a>
                </li>
            @endcan
            @can('categories.index')
                <li class="nav-item {{ setActive('admin/category*') }}">
                    <a href="{{ route('admin.category.index') }}" class="nav-link"><i
                            class="fas fa-file"></i><span>Categories</span></a>
                </li>
            @endcan
            @can('services.index')
                <li class="nav-item {{ setActive('admin/service*') }}">
                    <a href="{{ route('admin.service.index') }}" class="nav-link"><i
                            class="fas fa-layer-group"></i><span>Services</span></a>
                </li>
            @endcan
            @can('projects.index')
                <li class="nav-item {{ setActive('admin/project*') }}">
                    <a href="{{ route('admin.project.index') }}" class="nav-link"><i
                            class="fas fa-diagram-project"></i><span>Projects</span></a>
                </li>
            @endcan
            @can('teams.index')
                <li class="nav-item {{ setActive('admin/team*') }}">
                    <a href="{{ route('admin.team.index') }}" class="nav-link"><i
                            class="fas fa-people-group"></i><span>Teams</span></a>
                </li>
            @endcan
            @can('sliders.index')
                <li class="nav-item {{ setActive('admin/slider*') }}">
                    <a href="{{ route('admin.slider.index') }}" class="nav-link"><i
                            class="fas fa-window-restore"></i><span>Sliders</span></a>
                </li>
            @endcan
            @can('testimonials.index')
                <li class="nav-item {{ setActive('admin/testimonial*') }}">
                    <a href="{{ route('admin.testimonial.index') }}" class="nav-link"><i
                            class="fas fa-users-between-lines"></i><span>Testimonials</span></a>
                </li>
            @endcan
            @can('facts.index')
                <li class="nav-item {{ setActive('admin/fact*') }}">
                    <a href="{{ route('admin.fact.index') }}" class="nav-link"><i
                            class="fas fa-thumbs-up"></i><span>Facts</span></a>
                </li>
            @endcan
            @if (auth()->user()->can('roles.index') ||
                    auth()->user()->can('permissions.index') ||
                    auth()->user()->can('users.index'))
                <li class="menu-header text-capitalize">Configuration</li>
                <li
                    class="nav-item dropdown {{ setActive('admin/role') . setActive('admin/permission') . setActive('admin/user') }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-cog"></i><span>User
                            Management</span></a>
            @endif
            <ul class="dropdown-menu">
                @can('roles.index')
                    <li class="nav-item {{ setActive('admin/role*') }}">
                        <a href="{{ route('admin.role.index') }}" class="nav-link"><i
                                class="fas fa-address-card"></i><span>Roles</span></a>
                    </li>
                @endcan
                @can('permissions.index')
                    <li class="nav-item {{ setActive('admin/permission') }}">
                        <a href="{{ route('admin.permission.index') }}" class="nav-link"><i
                                class="fas fa-user-check"></i><span>Permissions</span></a>
                    </li>
                @endcan
                @can('users.index')
                    <li class="nav-item {{ setActive('admin/user*') }} ">
                        <a href="{{ route('admin.user.index') }}" class="nav-link"><i
                                class="fas fa-user-friends"></i><span>Users</span></a>
                    </li>
                @endcan
            </ul>
            </li>

</div>
