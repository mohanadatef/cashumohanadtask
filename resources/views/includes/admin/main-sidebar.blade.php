<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        {{--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
       {{-- <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{--<li class="nav-header">Core Data</li>--}}
                @if(permissionShow('acl-list'))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                             Acl
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                       {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>--}}
                        @if(permissionShow('user-list'))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                   User
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(permissionShow('user-index'))
                                <li class="nav-item">
                                    <a href="{{route('user.index')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>
                                    @endif
                            </ul>
                        </li>
                        @endif
                        @if(permissionShow('role-list'))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Role
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(permissionShow('role-index'))
                                <li class="nav-item">
                                    <a href="{{route('role.index')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>
                                    @endif
                            </ul>
                        </li>
                            @endif
                        @if(permissionShow('permission-list'))
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>
                                        Permission
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if(permissionShow('permission-index'))
                                        <li class="nav-item">
                                            <a href="{{route('permission.index')}}" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
                    @endif
                @if(permissionShow('sale-index'))
                    <li class="nav-item">
                        <a href="{{route('sale.index')}}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Sale</p>
                        </a>
                    </li>
                @endif
                @if(permissionShow('config-index'))
                    <li class="nav-item">
                        <a href="{{route('config.index')}}" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Config</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@yield('main-sidebar')
