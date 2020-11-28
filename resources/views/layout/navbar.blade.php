<body class="vertical-layout vertical-menu-modern 2-columns menu-collapsed fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fas fa-sliders-h"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="#">
                            <h2 class="brand-text">FOS</h2>
                        </a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                    
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
            		<ul class="nav navbar-nav mr-auto float-left">
                       <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="fas fa-expand"></i></a></li>
                         
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="avatar avatar-online"></div><span class="user-name"><i class="fas fa-user-tie"></i> {{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('profileUpdate')}}"><i class="fas fa-user-edit"></i> Edit Profile</a><a class="dropdown-item" href="{{url('newPassword')}}"><i class="fas fa-edit"></i> Change Password</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{url('logout')}}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="{{url('dashboard')}}"><i class="fas fa-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="fas fa-users"></i><span class="menu-title" data-i18n="Users">Users</span>@if(Auth::user()->isAdmin())<span class="badge badge badge-primary badge-pill float-right mr-2">2</span>@else<span class="badge badge badge-primary badge-pill float-right mr-2">1</span>@endif</a>
                    <ul class="menu-content">
                        @if(Auth::user()->isAdmin())
                        <li class=" nav-item"><a href="{{route('user.index')}}"><i class="fas fa-address-card"></i><span class="menu-title" data-i18n="Users">Manage Users</span></a>
                        </li>
                        @endif
                        <li class=" nav-item"><a href="{{route('userType.index')}}"><i class="fas fa-users-cog"></i><span class="menu-title" data-i18n="Count">Manage UserTypes</span></a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->isSoftwareEngineer())
                <li class=" nav-item"><a href="#"><i class="fas fa-tasks"></i><span class="menu-title" data-i18n="About Task">Task</span><span class="badge badge badge-primary badge-pill float-right mr-2">1</span></a>
                    <ul class="menu-content">
                        <li class=" nav-item"><a href="{{url('recivedTask')}}" class="emailBtn"><i class="fas fa-th-list"></i><span class="menu-title" data-i18n="manage task">Recived Task</span></a>
                        </li>
                    </ul>
                </li>
                @else
                <li class=" nav-item"><a href="#"><i class="fas fa-tasks"></i><span class="menu-title" data-i18n="About Task">Task</span><span class="badge badge badge-primary badge-pill float-right mr-2">3</span></a>
                    <ul class="menu-content">
                        @if(Auth::user()->isAdmin())
                        <li class=" nav-item"><a href="{{url('totalAssignTask')}}" class="emailBtn"><i class="fas fa-th-list"></i><span class="menu-title" data-i18n="manage task">Total Assign Task</span></a>
                        </li>
                        @else
                        <li class=" nav-item"><a href="{{url('recivedTask')}}" class="emailBtn"><i class="fas fa-th-list"></i><span class="menu-title" data-i18n="manage task">Recived Task</span></a>
                        </li>
                        @endif
                        <li class=" nav-item"><a href="{{url('assignedTask')}}" class="emailBtn"><i class="fas fa-th-list"></i><span class="menu-title" data-i18n="manage task">Assign Task</span></a>
                        </li>
                        <li class=" nav-item"><a href="{{route('task.index')}}"><i class="fas fa-plus-circle"></i><span class="menu-title" data-i18n="task">Add Task</span></a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class=" nav-item"><a href="{{route('department.index')}}"><i class="fas fa-layer-group"></i><span class="menu-title" data-i18n="Categories">Departments</span></a>
                </li>
                <li class=" nav-item"><a href="{{route('office.index')}}"><i class="far fa-building"></i><span class="menu-title" data-i18n="Food">Offices</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
</div>