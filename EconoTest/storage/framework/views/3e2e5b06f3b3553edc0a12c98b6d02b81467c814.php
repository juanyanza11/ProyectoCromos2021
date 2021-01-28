<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo" width="50" height="50"/>
        <div class="sidebar-brand-text mx-3">Econotest <sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.index')); ?>">
            <i class="fas fa-users"></i>
            <span>Usuarios</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/admin/preguntas">
            <i class="fas fa-tasks"></i>
            <span>Preguntas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/cromos">
            <i class="fas fa-images"></i>
            <span>Cromos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/tematicas">
            <i class="far fa-file-alt"></i>
            <span>Tematicas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/albums">
            <i class="far fa-address-book"></i>
            <span>Album</span>
        </a>
    </li>
</ul>
<?php /**PATH C:\xampp\htdocs\Proyectos\ProyectoCromos2021\EconoTest\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>