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
                <li class="nav-item">
                    <a href="{{ 'inventory' }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Inventory</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ 'penjemputan' }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Penjemputan Laundry</p>
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

        <li class="nav-item">
            <a href="{{ 'gaji' }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Simulasi Gaji Karyawan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ 'databarang' }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Data Barang
                </p>
            </a>
        </li>



        <li class="nav-header">USER</li>
        <li class="nav-item">
            <a href="{{ 'user' }}" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ 'data_karyawan' }}" class="nav-link">
                <i class="far fa-address-book nav-icon"></i>
                <p>Simulasi Data Karyawan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ 'simulasibarang' }}" class="nav-link">
                <i class="far fa-address-book nav-icon"></i>
                <p>Simulasi Transaksi Barang</p>
            </a>
        </li>

    </ul>
</nav>
