<aside class="left-sidebar" data-sidebarbg="skin6">

    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <!-- Dashboard -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <!-- MANAGEMENT -->
                <li class="nav-small-cap"><span class="hide-menu">MANAGEMENT</span></li>

                <!-- Tenant Mates -->
                <li class="sidebar-item">
                    <a href="{{ route('admin.users') }}" class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                        <span class="hide-menu">User Accounts</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <!-- PEOPLE RELATED -->
                <li class="nav-small-cap"><span class="hide-menu">PEOPLE</span></li>

                <!-- Tenants -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">Tenants</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href=" {{ route('admin.tenants.index') }}" class="sidebar-link">
                                <span class="hide-menu">View all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span class="hide-menu">New Tenant</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Tenant Mates -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-people-carry"></i>
                        <span class="hide-menu">Tenant Mates</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <!-- PROPERTY RELATED -->
                <li class="nav-small-cap"><span class="hide-menu">Property</span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-building"></i>
                        <span class="hide-menu">Apartments</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span class="hide-menu">View all</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span class="hide-menu">New Inputs</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
