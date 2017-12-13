<header class="main-header">
    <a href="/" class="logo">
        <span class="logo-mini"><b>V</b>ip</span>
        <span class="logo-lg"><b>Salão</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Alternar de navegação</span>
        </a>

        {{--  MENU  --}}

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!--img src="{{url('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"-->
                        <span class="hidden-xs"> {{session('users')}}  </span>
                    </a>
                    <ul class="dropdown-menu">             
                        <li class="user-header">
                            <!--img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"-->
                            <p>{{session('users')}}<small>Membro desde de {{auth()->user()->created_at->format('d/m/Y')}}</small></p>
                        </li>             
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('alterar.senha') }}" class="btn btn-default btn-flat">Alterar Senha</a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>