<nav class="navbar navbar-expand-lg navbar-white bg-white">
    <button type="button" id="sidebarCollapse" class="btn btn-light">
        <i class="fas fa-bars"></i><span></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <div class="nav-dropdown">
                    <a href="#" id="nav1" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span>Notifications</span>
                        @php
                        $pendingCount = \App\Models\Reservation::where('status', 'pending')->count();
                        @endphp
                        @if($pendingCount > 0)
                        <span class="badge bg-danger">{{ $pendingCount }}</span>
                        @endif
                        <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end nav-link-menu" aria-labelledby="nav1">
                        <ul class="nav-list">
                            <li>
                                <a href="{{ route('admin.leftovers.index') }}" class="dropdown-item">
                                    <i class="fas fa-utensils"></i> Manage Leftovers
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                            <li>
                                <a href="{{ route('admin.reservations.index') }}" class="dropdown-item">
                                    <i class="fas fa-concierge-bell"></i>
                                    Pending Reservations
                                    @if($pendingCount > 0)
                                    <span class="badge bg-warning text-dark float-end">{{ $pendingCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                            <li>
                                <a href="{{ route('admin.users.index') }}" class="dropdown-item">
                                    <i class="fas fa-users"></i> Manage Users
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                            <li>
                                <a href="{{ route('admin.reports.index') }}" class="dropdown-item">
                                    <i class="fas fa-chart-line"></i> Reports & Analytics
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                            <li>
                                <a href="{{ route('admin.settings.edit') }}" class="dropdown-item">
                                    <i class="fas fa-cog"></i> System Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <div class="nav-dropdown">
                    <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> <span>{{ Auth::user()->name }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                        <ul class="nav-list">
                            <li><a href="{{ route('profile.edit') }}" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                            <li><a href="{{ route('admin.settings.edit') }}" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>