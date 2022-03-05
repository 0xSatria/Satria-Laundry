<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ 'outlet' }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Outlet</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ 'paket' }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Paket</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ 'member' }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Member</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ 'transaksi' }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Transaksi
                </p>
            </a>
        </li>
        <li class="nav-header">USER</li>
        <li class="nav-item">
            <a href="{{ 'login' }}" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Login</p>
            </a>
        </li>

    </ul>
</nav>
