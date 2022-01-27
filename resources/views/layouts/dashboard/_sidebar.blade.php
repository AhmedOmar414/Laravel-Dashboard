<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('dashboard')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column pl-3" data-widget="treeview" role="menu" data-accordion="false">
                {{--start options--}}
                <li >
                    <a href="{{route('dashboard.home')}}">
                        <p>
                            <i class="fas fa-tachometer-alt mr-2" style="font-size:20px"></i>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li >
                    <a href="{{route('dashboard.users.index')}}" >
                        <p>
                            <i class="fas fa-users mr-2" style="font-size:20px"></i>
                            Users
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
