<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <!-- <img src="assets/img/bootstraper-logo.png" alt="bootraper logo" class="app-logo"> -->
        <h2 class="text-theme-color" style="color: #EB0029; font-size:20px" >Active Restaurant</h2>
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="{{ route('admin.dashboard.index') }}" :active="request()->routeIs('admin.dashboard.index')"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li>
            <a href="#foodmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-file-alt"></i> Menus</a>
            <ul class="collapse list-unstyled" id="foodmenu">
                <li>
                    <a href="{{ route('admin.menus.index') }}" :active="request()->routeIs('admin.menus.index')"><i class="fas fa-lock"></i> Food Menu</a>
                </li>
                <li>
                    <a href="{{ route('admin.menu_feedback.index') }}"><i class="fas fa-user-plus"></i> Feedbacks</a>
                </li>
                <li>
                    <a href="{{ route('admin.menu_reservations.index') }}" :active="request()->routeIs('admin.menu_reservations.index')"><i class="fas fa-user-plus"></i> Reservations</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.leftovers.index') }}" :active="request()->routeIs('admin.leftovers.index')"><i class="fas fa-table"></i> Leftovers</a>
        </li>
        <li>
            <a href="{{ route('admin.reservations.index') }}" :active="request()->routeIs('admin.reservations.index')"><i class="fas fa-table"></i> Reservations</a>
        </li>
        <li>
            <a href="{{ route('admin.buffets.index') }}"><i class="fas fa-chart-bar"></i> Buffets</a>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')"><i class="fas fa-user-friends"></i>Users</a>
        </li>
        <li>
            <a href="{{ route('admin.subscribers.index') }}" :active="request()->routeIs('admin.subscribers.index')"><i class="fas fa-cog"></i>Subscribers</a>
        </li>
        <li>
            <a href="{{ route('admin.reports.index') }}" :active="request()->routeIs('admin.reports.index')">
                <i class="fas fa-chart-line"></i> Reports & Analytics
            </a>
        </li>
        <li>
            <a href="{{ route('admin.payments.index') }}" :active="request()->routeIs('admin.payments.index')">
                <i class="fas fa-card"></i> Payments
            </a>
        </li>
    </ul>
</nav>