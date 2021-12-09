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
    <ul class="menu d-blok">
        <li class="sidebar-item @if(Route::is('admin.dashboard')) active @endif">
            <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item @if(Route::is('admin.clientes')) active @endif
        @if(Route::is('admin.clientes.edit')) active @endif
        @if(Route::is('admin.clientes.show')) active @endif">
            <a href="{{route('admin.clientes')}}" class='sidebar-link'>
                <i class="bi bi-people"></i>
                <span>Clientes</span>
            </a>
        </li>
        <li class="sidebar-item  has-sub 
            @if(Route::is('admin.consultas')) active @endif
            @if(Route::is('admin.consultas.pendentes')) active @endif
            @if(Route::is('admin.consultas.show')) active @endif
            ">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-card-checklist"></i>
                <span>Consultas</span>
            </a>
            <ul class="submenu @if(Route::is('admin.consultas')) display @endif
            @if(Route::is('admin.consultas.pendentes')) display @endif
            @if(Route::is('admin.consultas.show')) active @endif">
                <li class="submenu-item ">
                    <a href="{{route('admin.consultas')}}">Efetivadas</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('admin.consultas.pendentes')}}">Pendentes</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub @if(Route::is('admin.sintomas')) active @endif
            @if(Route::is('admin.sintomas.create')) active @endif
            @if(Route::is('admin.sintomas.edit')) active @endif ">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-dash-square"></i>
                <span>Sintomas</span>
            </a>
            <ul class="submenu @if(Route::is('admin.sintomas')) display @endif
            @if(Route::is('admin.sintomas.create')) display @endif
            @if(Route::is('admin.sintomas.edit')) display @endif 
            ">
                <li class="submenu-item ">
                    <a href="{{route('admin.sintomas')}}">Listar Todos</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{route('admin.sintomas.create')}}">Cadastrar Novo</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  has-sub 
        @if(Route::is('admin.chas')) active @endif
        @if(Route::is('admin.chas.create')) active @endif
        @if(Route::is('admin.caracteristicas')) active @endif
        @if(Route::is('admin.chas.edit')) active @endif
        @if(Route::is('admin.chas.caracteristica')) active @endif
        @if(Route::is('admin.chas.show'))  active @endif
        @if(Route::is('admin.chas.edit'))  active @endif
        @if(Route::is('admin.caracteristicas.edit')) active @endif
        ">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-cup"></i>
                <span>Chás</span>
            </a>
            <ul class="submenu @if(Route::is('admin.chas')) display @endif
            @if(Route::is('admin.chas.create')) display @endif
            @if(Route::is('admin.caracteristicas')) display @endif
            @if(Route::is('admin.chas.caracteristica')) display @endif
            @if(Route::is('admin.chas.show')) display @endif
            @if(Route::is('admin.chas.edit')) display @endif
            @if(Route::is('admin.caracteristicas.edit')) display @endif
           
            ">
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

        <style>
            .display {
                display: block !important;
            }
        </style>

    </ul>
</div>

<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>