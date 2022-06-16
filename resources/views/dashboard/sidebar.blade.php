<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link navbar-danger">
        <img src="{{ URL::to('/images') }}/amgym.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="color:white"><b>Database of ES Team</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ URL::to('/storage/'.Auth::user()->profile_photo_path) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                @can('manage-opportunity')
                <li class="nav-header" style="color:red"><u>OPPORTUNITIES</u></li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ 'opportunity' == request()->segment(1) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt text-green"></i>
                        <p>
                            Opportunity
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (!Auth::user()->hasRole('Manager') AND !Auth::user()->hasRole('Secretary'))
                        <li class="nav-item">
                            <a href="{{ url('/opportunity/presale') }}" class="nav-link {{ 'presale' == request()->segment(2) ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>My opportunity</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('/opportunity/allopportunity') }}" class="nav-link {{ 'allopportunity' == request()->segment(2) ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>All opportunity</p>
                            </a>
                        </li>
                        @if (
                        (Auth::user()->name == 'Relly Suwandana Agung Setyo') OR
                        (Auth::user()->name == 'Briyan Bagas Bima Saputra') OR
                        (Auth::user()->name == 'Lulud Iswanto') OR
                        (Auth::user()->name == 'Erwan Budiman')
                        )
                        <li class="nav-item">
                            <a href="{{ url('/opportunity/dataanalysis') }}" class="nav-link {{ 'dataanalysis' == request()->segment(2) ? 'active' : '' }}">
                                <!-- <i class="nav-icon fad fa-chart-pie text-info"></i> -->
                                <i class="nav-icon fad fa-chart-line text-info"></i>
                                <p>Data Analysis</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ url('customers') }}" class="nav-link {{ 'customers' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-edit text-warning"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('products') }}" class="nav-link {{ 'products' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt text-info"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('transactions') }}" class="nav-link {{ 'transactions' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt text-info"></i>
                        <p>
                            Transactions
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>