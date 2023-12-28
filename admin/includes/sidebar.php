<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" target="_blank" href="../../index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DB Electro</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="../dashboard/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Clients section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClient" aria-expanded="true" aria-controls="collapseClient">
            <i class="fas fa-fw fa-users"></i>
            <span>Clients</span>
        </a>
        <div id="collapseClient" class="collapse" aria-labelledby="headingClient" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion de clients:</h6>
                <a class="collapse-item" href="../clients/create-client.php">Ajouter</a>
                <a class="collapse-item" href="../clients/lists-client.php">Listes</a>
            </div>
        </div>
    </li>

    <!-- Repairs section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserepair" aria-expanded="true" aria-controls="collapserepair">
            <i class="fas fa-fw fa-list"></i>
            <span>Réparations</span>
        </a>
        <div id="collapserepair" class="collapse" aria-labelledby="headingrepair" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion de Réparations:</h6>
                <a class="collapse-item" href="../repairs/create-repair.php">Ajouter</a>
                <a class="collapse-item" href="../repairs/lists-repair.php">Listes</a>
            </div>
        </div>
    </li>

    <!-- Materials section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Materiels</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion des appareils :</h6>
                <a class="collapse-item" href="../tools/lists-tool.php">Liste</a>
                <a class="collapse-item" href="../tools/create-tool.php">Ajouter<i class="fas fa-utensil-fork    "></i></a>
            </div>
        </div>
    </li>

    <!-- Services section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServices" aria-expanded="true" aria-controls="collapseServices">
            <i class="fas fa-fw fa-list"></i>
            <span>Services</span>
        </a>
        <div id="collapseServices" class="collapse" aria-labelledby="headingServices" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion de services:</h6>
                <a class="collapse-item" href="../services/create-services.php">Ajouter</a>
                <a class="collapse-item" href="../services/services.php">Listes</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Utilisateurs
    </div>

    <!-- Users management section -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Gestion des utilisateurs</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="../users/users.php">Listes</a>
                <a class="collapse-item" href="../users/create-users.php">Ajouter</a>
            </div>
        </div>
    </li>

    <!-- Contact section-->
    <li class="nav-item">
        <a class="nav-link" href="../pages/messages.php">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Messages<s></s></span>
        </a>
    </li>

    <!-- Enquiries section-->
    <li class="nav-item">
        <a class="nav-link" href="../pages/demande.php">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Renseignements<s></s></span>
        </a>
    </li>

    <!-- Charts section-->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Statistiques<s></s></span>
        </a>
    </li>

    <!-- Social media section -->
    <li class="nav-item">
        <a class="nav-link" href="../pages/lists-social-media.php">
            <i class="fas fa-fw fa-link"></i>
            <span>Réseaux sociaux</span>
        </a>
    </li>

    <!-- Settings section -->
    <li class="nav-item">
        <a class="nav-link" href="../pages/settings.php">
            <i class="fas fa-fw fa-cog"></i>
            <span>Paramètre</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->