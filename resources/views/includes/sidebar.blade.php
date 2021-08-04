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
                    <a href="{{ route('admin.tenants.index') }}" class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu">Tenants</span>
                    </a>
                </li>

                <!-- Tenant Mates -->
                <li class="sidebar-item">
                    <a href=" {{ route('admin.tenant_mates.index') }} " class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-people-carry"></i>
                        <span class="hide-menu">Tenant Mates</span>
                    </a>
                </li>


                <li class="list-divider"></li>

                <!-- PROPERTY RELATED -->
                <li class="nav-small-cap"><span class="hide-menu">Property</span></li>
                <li class="sidebar-item">
                    <a href=" {{ route('admin.apartments.index') }} " class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-building"></i>
                        <span class="hide-menu">Apartments</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <!-- PAYMENTS RELATED -->
                <li class="nav-small-cap"><span class="hide-menu">Payments</span></li>

                <!-- Deposits -->
                <li class="sidebar-item">
                    <a href=" {{ route('admin.rent_payments.index') }} " class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-piggy-bank"></i>
                        <span class="hide-menu">Deposits</span>
                    </a>
                </li>

                <!-- Rent -->
                <li class="sidebar-item">
                    <a href=" {{ route('admin.rent_payments.index') }} " class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-money-bill-alt"></i>
                        <span class="hide-menu">Rent Payments</span>
                    </a>
                </li>

                <!-- Water -->
                <li class="sidebar-item">
                <a href=" {{ route('admin.water_payments.index') }} " class="sidebar-link" aria-expanded="false">
                    <i class="fas fa-warehouse"></i>
                    <span class="hide-menu">Water Payments</span>
                </a>
                </li>

                <li class="list-divider"></li>

                <!-- DOCUMENTATION RELATED -->
                <li class="nav-small-cap"><span class="hide-menu">Documentation</span></li>

                <!-- Documents -->
                <li class="sidebar-item">
                    <a href=" {{ route('admin.documents.index') }} " class="sidebar-link" aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <span class="hide-menu">Documents</span>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
