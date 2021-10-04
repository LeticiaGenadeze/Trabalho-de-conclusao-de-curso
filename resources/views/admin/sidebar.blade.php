<div class="sidebar-header">
    <div class="d-flex justify-content-between">
        <div class="logo">
            <a href=""><img src="{{ asset('themes/admin/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
        </div>
        <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
    </div>
</div>

<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item active ">
            <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item ">
            <a href="{{route('admin.clientes')}}" class='sidebar-link'>
                <i class="bi bi-people"></i>
                <span>Clientes</span>
            </a>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-card-checklist"></i>
                <span>Consultas</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('admin.consultas')}}">Efetivadas</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('admin.consultas.pendentes')}}">Pendentes</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-dash-square"></i>
                <span>Sintomas</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('admin.sintomas')}}">Listar Todos</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('admin.sintomas.create')}}">Cadastrar Novo</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-cup"></i>
                <span>Chás</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{route('admin.chas')}}">Listar Todos</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('admin.chas.create')}}">Cadastrar Novo</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('admin.caracteristicas')}}">Características</a>
                </li>
            </ul>
        </li>





        <!--
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Item Principal</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="">Subitem</a>
                </li> 
            </ul>
        </li>    
        <li class="sidebar-item ">
            <a href="" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Item sem Submenu</span>
            </a>
        </li>
    -->

    </ul>
</div>

<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>