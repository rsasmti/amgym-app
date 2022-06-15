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


                @canany(['presales-only','manage-customer-operation','sales-only','menu-approval-document'])
                <li class="nav-header" style="color:red"><u>DOCUMENTS</u></li>
                @endcanany

                <li class="nav-item">
                    <a href="{{ url('customers') }}" class="nav-link {{ 'customers' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-file-signature text-info"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>
                @can('manage-developer')
                <li class="nav-item">
                    <a href="{{ url('/approval/approval_systems') }}" class="nav-link {{ 'approval_systems' == request()->segment(2) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-file-signature text-info"></i>
                        <p>
                            Old Approval Document
                        </p>
                    </a>
                </li>
                @endcan

                @canany(['presales-only','manage-customer-operation','sales-only'])
                <li class="nav-item">
                    <a href="{{ url('/inter_office_memos') }}" class="nav-link {{ 'inter_office_memos' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fad fa-copy text-warning"></i>
                        <p>
                            Inter-Office Memo
                        </p>
                    </a>
                </li>
                @endcanany


                @canany(['presales-only','manage-customer-operation','menu-tool-desk-survey'])
                <li class="nav-header" style="color:red"><u>TOOLS</u></li>
                <li class="nav-item">
                    <a href="{{ url('/ondesksurvey') }}" target="_blank" class="nav-link {{ 'ondesksurvey' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon bi bi-wrench text-danger"></i>
                        <!-- https://icons.getbootstrap.com/icons/tools/ -->
                        <p>
                            On Desk Survey
                            <span class="badge badge-info right">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/multidesksurvey') }}" target="_blank" class="nav-link {{ 'multidesksurvey' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon bi bi-tools text-info"></i>
                        <p>
                            Multi Desk Survey
                            <span class="badge badge-info right">New</span>
                        </p>
                    </a>
                </li>
                @endcanany
                @can('menu-capacity-forecast')
                <!-- if ((Auth::user()->name == 'Relly Suwandana Agung Setyo')) -->
                <li class="nav-item">
                    <a href="{{ url('/b2b_capacity_forecast') }}" target="_blank" class="nav-link {{ 'b2b_capacity_forecast' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <!-- <i class="nav-icon bi bi-tools text-info"></i> -->
                        <i class="bi bi-activity text-warning"></i>
                        <p>
                            Capacity Forecast
                            <span class="badge badge-info right">New</span>
                        </p>
                    </a>
                </li>
                @endcan

                @if (
                //(Auth::user()->name == 'Relly Suwandana Agung Setyo') OR
                (Auth::user()->name == 'Relly Suwandana Agung Setyo') OR
                (Auth::user()->name == 'Evie Susanti Keman') OR
                (Auth::user()->name == 'Paryono') OR
                (Auth::user()->name == 'Ajeng Syeila Restia') OR
                (Auth::user()->name == 'Erwan Budiman')
                )
                <li class="nav-header" style="color:red"><u>PROJECTS</u></li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ 'b2b_project' == request()->segment(1) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars text-green"></i>
                        <p>
                            B2B Projects
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('b2b_project/b2b_capacity') }}" class="nav-link {{ 'b2b_capacity' == request()->segment(2) ? 'active' : '' }}">
                                <i class="nav-icon bi bi-cash-coin text-primary"></i>
                                <p>B2B Cap & Monetization</p>
                            </a>
                        </li>
                        @if (
                        (Auth::user()->name == 'Relly Suwandana Agung Setyo')
                        )
                        <li class="nav-item">
                            <a href="{{ url('b2b_project/b2b_master_project') }}" class="nav-link {{ 'b2b_master_project' == request()->segment(2) ? 'active' : '' }}">
                                <i class="nav-icon bi bi-cash-coin text-primary"></i>
                                <p>Master Project</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('b2b_project/b2b_master_sow') }}" class="nav-link {{ 'b2b_master_sow' == request()->segment(2) ? 'active' : '' }}">
                                <i class="nav-icon bi bi-cash-coin text-primary"></i>
                                <p>Master SOW</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('b2b_project/b2b_master_segment') }}" class="nav-link {{ 'b2b_master_segment' == request()->segment(2) ? 'active' : '' }}">
                                <i class="nav-icon bi bi-cash-coin text-primary"></i>
                                <p>Master Segment</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @canany(['presales-only','manage-customer-operation','menu-support-database'])
                <li class="nav-header" style="color:red"><u>SUPPORT DATABASES</u></li>
                <li class="nav-item">
                    <a href="https://o365indosat.sharepoint.com/sites/Trainingmaterial/Shared%20Documents/Forms/AllItems.aspx" target="_blank" class="nav-link">
                        <i class="nav-icon fas fa-book-reader text-blue"></i>
                        <p>
                            Training materials
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ 'support' == request()->segment(1) ? 'active' : '' }}">
                        <i class="nav-icon far fa-plus-square text-orange"></i>
                        <p>
                            Support
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/support/routerswitchdatas') }}" class="nav-link {{ 'routerswitchdatas' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Router & Switch</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/support/costbmxconnectiondatas') }}" class="nav-link {{ 'costbmxconnectiondatas' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BM / T-Line
                                    <span class="badge badge-info right">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/pic_to_regional_datas') }}" class="nav-link {{ 'pic_to_regional_datas' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PIC TO Regional
                                    <span class="badge badge-info right">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/support/ndb_radios') }}" class="nav-link {{ 'ndb_radios' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BTS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/support/ndb_microwave') }}" class="nav-link {{ 'ndb_microwave' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Microrowave</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('https://o365indosat.sharepoint.com/sites/NNIConnect/Shared%20Documents') }}" target="_blank" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data NNI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/support/fe-supporting_websites') }}" class="nav-link {{ 'fe-supporting_websites' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Supporting Website</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/support/midi_all_assets') }}" class="nav-link {{ 'midi_all_assets' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MIDI All Assets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/support/sitac_data') }}" class="nav-link {{ 'sitac_data' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ISM SITAC Data's</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/support/ism_leased_line') }}" class="nav-link {{ 'ism_leased_line' == request()->segment(2) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ISM Leased Line Data's</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcanany

                @can('manage-support-admin')
                <li class="nav-header" style="color:red"><u>BACKEND</u></li>
                <li class="nav-item">
                    <a href="{{ url('/salessolutions') }}" class="nav-link {{ 'salessolutions' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-address-book"></i>
                        <p>
                            Sales Solution
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/sales') }}" class="nav-link {{ 'sales' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Account Manager
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/customers') }}" class="nav-link {{ 'customers' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Customer
                        </p>
                    </a>
                </li>
                @endcan




                @if (((Auth::user()->name ) == 'Relly Suwandana Agung Setyo') AND (Auth::user()->hasRole('Developer')))
                <li class="nav-item">
                    <a href="{{ url('/users') }}" class="nav-link {{ 'users' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/approvalsystems') }}" class="nav-link {{ 'approvalsystems' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Approval Document
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/approval/b_approvalsystems') }}" class="nav-link {{ 'b_approvalsystems' == request()->segment(2) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fad fa-edit text-info"></i>
                        <p>
                            Approval Document
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/be_supporting_websites') }}" class="nav-link {{ 'be_supporting_websites' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-atlas"></i>
                        <p>
                            Supporting Website
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/be_inter_office_memos') }}" class="nav-link {{ 'be_inter_office_memos' == request()->segment(1) ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Inter-Office Memo
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Role & Permission
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('assign.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assign Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('assign.user.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions to Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>