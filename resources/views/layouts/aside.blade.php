<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-tent"></i>
                </div>
                <div class="sidebar-brand-text mx-3">GBC System</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interfaz
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Configuración</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-person-circle"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Roles y Permisos:</h6>
                        <a class="collapse-item" href="/Roles">Roles</a>
                        <a class="collapse-item" href="{{ route('ListUser') }}">Usuarios</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-cart"></i>
                    <span>Servicios</span>
                </a>
                <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Servicios</h6>
                        <a class="collapse-item" href="{{ route('servicioIndex') }}">Servicios</a>
                        <a class="collapse-item" href="{{route('planserviciolistar') }}">Planes</a>
                    </div>
                </div>
            </li>
        
            <!-- Divider -->
            <!--<hr class="sidebar-divider">-->

            <!-- Heading -->

            <!--<div class="sidebar-heading">
                Addons
            </div>-->

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span>Reservas</span>
                </a>
                <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reservas</h6>
                        <a class="collapse-item" href="#">Agenda</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Ventas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('domocaracteristicalistar') }}">
                    <i class="fa-solid fa-igloo"></i></i>
                    <span>Domos</span></a>
            </li>

            <!-- Nav Item - Tables -->

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('domoIndex')}}">
                    <i class="bi bi-house-fill"></i>
                    <span>Domos--</span></a>
            </li> --}}



            <li class="nav-item">
                <a class="nav-link" href="{{route('caracteristicaIndex') }}">
                    <i class="fa-solid fa-tv"></i>
                    <span>Caracteristicas</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="bi bi-chat-heart"></i>
                    <span>Recomendaciones</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="bi bi-question-circle-fill"></i>
                    <span>Ayudas</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           

        </ul>