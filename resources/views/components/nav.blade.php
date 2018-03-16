<div id="nav-col">
    <section id="col-left" class="col-left-nano">
        <div id="col-left-inner" class="col-left-nano-content">
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                <ul class="nav nav-pills nav-stacked">
                    <li class=" {{ activeMenu('/') }}">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home"></i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li class=" {{ activeMenu('clientes') }} 
                                {{ activeMenu('clientes/create') }}">
                        <a href="{{ route('clientes.index') }}">
                            <i class="fa fa-users"></i>
                            <span>Clientes</span>
                        </a>
                    </li>
                    <li class=" {{ activeMenu('articulos') }} 
                                {{ activeMenu('articulos/create') }}
                                {{ activeMenu('categorias') }}
                                {{ activeMenu('categorias/create') }}">
                        <a class="dropdown-toggle">
                            <i class="fa fa-barcode"></i>
                            <span>Artículos</span>
                            <i class="fa fa-angle-right drop-icon"></i>
                        </a>
                        <ul class="submenu">
                            <li class=" {{ activeMenu('articulos') }}
                                        {{ activeMenu('articulos/create') }} ">
                                <a href="{{ route('articulos.index') }}">
                                    <i class="fa fa-check"></i>
                                    Inventario
                                </a>
                            </li>
                            <li class=" {{ activeMenu('categorias') }}
                                        {{ activeMenu('categorias/create') }}">
                                <a href="{{ route('categorias.index') }}">
                                    <i class="fa fa-bookmark"></i>
                                    Categorías
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- @if (auth()->check()) --}}
                        {{-- @if ( auth()->user()->hasRoles(['admin']) ) --}}
                            <li class=" {{ activeMenu('usuarios') }}
                                        {{ activeMenu('usuarios/create') }}">
                                <a href="{{ route('usuarios.index') }}">
                                    <i class="fa fa-user"></i>
                                    <span>Usuarios</span>
                                </a>
                            </li>
                        {{-- @endif --}}
                    {{-- @endif --}}
                    <li class=" {{ activeMenu('pagos') }}">
                        <a href="{{ route('pagos.index') }}">
                            <i class="fa fa-dollar"></i>
                            <span>Pagos</span>
                        </a>
                    </li>
                    <li class=" {{ activeMenu('compras') }}">
                        <a href="{{ route('compras.index') }}">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Compras</span>
                        </a>
                    </li>
                    <li class=" {{ activeMenu('articulos') }}">
                        <form align="center" role="form" action="{{ route('articulos.index') }}">
                            <button style="background: transparent;" type="submit" id="ingreso" autofocus=""></button>
                        </form>
                    </li>
                    {{-- <li class=" {{ activeMenu('register') }} {{ activeMenu('register') }}">
                        <a class="dropdown-toggle">
                            <i class="fa fa-file"></i>
                            <span>Reportes</span>
                            <i class="fa fa-angle-right drop-icon"></i>
                        </a>
                        <ul class="submenu">
                            <li class=" {{ activeMenu('articulos') }}">
                                <a href="{{ route('home') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Compras
                                </a>
                            </li>
                            <li class=" {{ activeMenu('categorias') }}">
                                <a href="{{ route('home') }}">
                                    <i class="fa fa-tag"></i>
                                    Ventas
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li class=" {{ activeMenu('register') }}">
                        <form align="center" role="form" method="GET" action="{{ route('shop') }}">
                            {!! method_field('GET') !!}
                            <button style="background: transparent;" type="submit" id="ingreso" autofocus=""></button>
                            <div id="respuesta"></div>
                        </form>
                    </li> --}}
                    
                </ul>
            </div>
        </div>
    </section>
    <div id="nav-col-submenu"></div>
</div>


