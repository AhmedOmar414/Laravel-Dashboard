<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('uploads/user_images/'.auth()->user()->image_url)}}" class="img-circle" alt="User Image">
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
                <li class="mt-2">
                    <a href="{{route('dashboard.home')}}">
                        <p>
                            <i class="fas fa-tachometer-alt mr-3" style="font-size:20px"></i>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="mt-2">
                    <a href="{{route('dashboard.categories.index')}}" >
                        <p>
                            <i class="fas fa-list-alt mr-3" style="font-size:20px"></i>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="mt-2">
                    <a href="{{route('dashboard.products.index')}}" >
                        <p>
                            <i class="fas fa-list-ul mr-3" style="font-size:20px"></i>
                            Products
                        </p>
                    </a>
                </li>
                <li class="mt-2">
                    <a href="{{route('dashboard.users.index')}}" >
                        <p>
                            <i class="fas fa-users mr-3" style="font-size:20px"></i>
                            Users
                        </p>
                    </a>
                </li>
                @if(auth()->user()->hasrole('Administrator'))
                    <li class="mt-2">
                        <a href="{{route('dashboard.roles.index')}}" >
                            <p>
                                <i class="fas fa-user-shield mr-3" style="font-size:20px"></i>
                                Roles & Permissions
                            </p>
                        </a>
                    </li>
                @endif
                <li class="mt-2">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off mr-3"  style="font-size:20px"></i>
                        Sign Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
