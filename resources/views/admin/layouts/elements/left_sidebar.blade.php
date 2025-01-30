<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{route('admin.dashboard')}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin/assets/images/logo-dark-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            {{--  Name Tag  --}}
            {{--  <li class="side-nav-title">Apps</li>  --}}

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>            
            
            {{--  multi Level login  --}}
            {{--  <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span> Tasks </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTasks">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-tasks.html">List</a>
                        </li>
                        <li>
                            <a href="apps-tasks-details.html">Details</a>
                        </li>
                        <li>
                            <a href="apps-kanban.html">Kanban Board</a>
                        </li>
                    </ul>
                </div>
            </li>  --}}
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>