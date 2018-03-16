<header class="navbar" id="header-navbar">
    <?php function activeMenu ($url){
        return request()->is($url) ? 'active' : '';
    } ?>
    <div class="container">
        <a href="{{ route('home') }}" id="logo" class="navbar-brand">
            <div style="display: inline">
                <img style="width: 60px" src="{{asset('plugins/img/logob.png')}}" alt="" class="normal-logo logo-white"/>
            </div>
            
            <img src="{{asset('plugins/img/logo-black.png')}}" alt="" class="normal-logo logo-black"/>
            <img src="{{asset('plugins/img/logo-small.png')}}" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
        </a>

        <div class="clearfix">
            {{-- <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button> --}}

            <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                <ul class="nav navbar-nav pull-left">
                    <li>
                        <a class="btn" id="make-small-nav">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-no-collapse pull-right" id="header-nav">
                <ul class="nav navbar-nav pull-right">

                    {{-- @include('components.notifications') --}}

                    <li class="dropdown profile-dropdown">
                        @if (auth()->check())
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @foreach($users as $user)@endforeach
                                <img src="{{ Storage::url($user->picture) }}">
                                <span class="hidden-xs">{{ auth()->user()->name }}</span> 
                                {{-- <b class="caret"></b> --}}
                                
                            </a>
                            
                            {{-- <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="/usuarios/{{ auth()->id() }}">
                                        <i class="fa fa-user"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="/usuarios/{{ auth()->id() }}/edit">
                                        <i class="fa fa-cog"></i>
                                        Configuración
                                    </a>
                                </li>
                                <li>
                                    <a href="/logout">
                                        <i class="fa fa-power-off"></i>
                                        Cerrar sesión
                                    </a>
                                </li>
                            </ul> --}}
                        @endif
                    </li>
                    
                    <li class="hidden-xxs">
                        <a class="btn" href="/logout">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>