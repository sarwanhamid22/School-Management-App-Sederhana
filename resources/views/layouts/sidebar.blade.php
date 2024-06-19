{{-- <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i> 
                        <span>Settings</span>
                    </a>
                </li>
                <li class="submenu">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Admin Dashboard</a></li>
                        <li><a href="#">Teacher Dashboard</a></li>
                        <li><a href="#">Student Dashboard</a></li>
                    </ul>
                </li>
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li class="submenu">
                    <a href="#">
                        <i class="fas fa-shield-alt"></i>
                        <span>User Management</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">List Users</a></li>
                    </ul>
                </li>
                @endif

                <li class="submenu">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Students</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Student List</a></li>
                        <li><a href="#">Student Add</a></li>
                        <li><a href="#">Student Edit</a></li>
                        <li><a href="#">Student View</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Teachers</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Teacher List</a></li>
                        <li><a href="#">Teacher View</a></li>
                        <li><a href="#">Teacher Add</a></li>
                        <li><a href="#">Teacher Edit</a></li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Departments</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Department List</a></li>
                        <li><a href="#">Department Add</a></li>
                        <li><a href="#">Department Edit</a></li>
                    </ul>
                </li>

                <!-- Lanjutkan untuk setiap submenu yang lain -->
            </ul>
        </div>
    </div>
</div> --}}
