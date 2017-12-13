<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$title or '' }} Salão </title>
  <link rel="shortcut icon" type="image/x-icon" href="/images/salao-icon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url( mix('/css/vendor.css'))}}"> 
  @yield('css')
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Google Font -->
</head>






<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">      
      <span class="logo-mini"><b>V</b>ip</span>
      <span class="logo-lg"><b>Salão</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Alternar de navegação</span>
      </a>

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
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">     
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU PRINCIPAL</li>        
        

        @if(Route::getRoutes()->hasNamedRoute('clientes.index'))
          @permissao('clientes')
            <li>
              <a href="{{ route('clientes.index')}}">
                <i class="fa fa-id-card"></i> <span>Clientes</span>
              </a>
            </li>
          @endpermissao
        @endif 


        @if(Route::getRoutes()->hasNamedRoute('atendimentos.index'))
          @permissao('caixa')
            <li>
              <a href="{{ route('atendimentos.index')}}">
                <i class="fa fa-id-card"></i> <span>Atendimentos de Hoje</span>
              </a>
            </li>
          @endpermissao
        @endif
          

        @if(Route::getRoutes()->hasNamedRoute('caixa.index'))
          @permissao('caixa')
            <li>
              <a href="{{ route('caixa.index')}}">
                <i class="fa fa-id-card"></i> <span>Relatório de caixa</span>
              </a>
            </li>
          @endpermissao
        @endif



        @if(Route::getRoutes()->hasNamedRoute('servicos.index'))
         <li class="treeview">
          <a href="#"><i class="fa fa-dashboard"></i> <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              @if(Route::getRoutes()->hasNamedRoute('servicos.index'))
                @permissao('servicos')
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('servicos.index')}}">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        Serviços
                      </a>
                    </li>
                @endpermissao			
              @endif
              @if(Route::getRoutes()->hasNamedRoute('produtos.index'))    
                @permissao('produtos')
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('produtos.index')}}">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        Produtos
                      </a>
                    </li>
                @endpermissao	
              @endif
              @if(Route::getRoutes()->hasNamedRoute('operadoras.index'))
                @permissao('operadoras')
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('operadoras.index')}}">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        Operadoras
                      </a>
                    </li>
                @endpermissao	
              @endif
          </ul>
        </li>
      @endif



      @if(Route::getRoutes()->hasNamedRoute('despesas.index'))
       @permissao('despesas')            
          <li>                
            <a href="{{ route('despesas.index')}}"><i class="fa fa-id-card"></i> <span>Despesas</span></a>
          </li>
        @endpermissao
      @endif
      @if(Route::getRoutes()->hasNamedRoute('funcionarios.index'))
        @permissao('funcionarios')
          <li>
            <a href="{{ route('funcionarios.index')}}"><i class="fa fa-id-card"></i> <span>Funcionarios</span></a>
          </li>
        @endpermissao
      @endif





      @if(Route::getRoutes()->hasNamedRoute('gerencialAtendimentos.index'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Gerencial</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           @if(Route::getRoutes()->hasNamedRoute('gerencialAtendimentos.index'))
            @permissao('usuarios')
              <li class="active">
                <a  href="{{ route('gerencialAtendimentos.index') }}"> <span class="sr-only">(current)</span>
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                  Atendimentos
                </a>
              </li>
            @endpermissao
           @endif
          @if(Route::getRoutes()->hasNamedRoute('gerencial.relatorio.geral'))
            @permissao('usuarios')
              <li class="active">
                <a  href="{{ route('gerencial.relatorio.geral') }}" target="_blank"> <span class="sr-only">(current)</span>
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                  Relatorio Geral
                </a>
              </li>
            @endpermissao
           @endif
            
          </ul>
        </li>
      @endif










        @if(Route::getRoutes()->hasNamedRoute('autorizacao')) 
        @permissao('admin-master-power')

            <li class="treeview">
              <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Admin</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">

                @if(Route::getRoutes()->hasNamedRoute('autorizacao_users.index'))
                  @permissao('usuarios')
                    <li class="active">
                      <a  href="{{ route('autorizacao_users.index') }}"> <span class="sr-only">(current)</span>
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        Usuários
                      </a>
                    </li>
                  @endpermissao
                @endif


                @if(Route::getRoutes()->hasNamedRoute('perfis.index'))
                  @permissao('usuarios')
                    <li class="active">
                      <a  href="{{ route('perfis.index') }}"> <span class="sr-only">(current)</span>
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        Perfil
                      </a>
                    </li>
                  @endpermissao 
                @endif



                @if(Route::getRoutes()->hasNamedRoute('permissoes.index'))
                  @permissao('usuarios')
                    <li class="active">
                      <a  href="{{ route('permissoes.index') }}"> <span class="sr-only">(current)</span>
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        Permissões
                      </a>
                    </li>
                  @endpermissao
                @endif

              </ul>
            </li>

          @endpermissao
        @endif
         
        <li class="header">LABELS</li>

        @yield('menuLateral')
               
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         @yield('titulo-page')
        <small>@yield('small-titulo-page')</small>
      </h1>      	
    </section>
    <!-- Main content -->
    <section class="content">
         @yield('contentMaster')
    </section>
    <!-- /.content -->    
  </div>
  <!-- /.content-wrapper -->


 

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->




<script src="{{url( mix('/js/vendor.js'))}}"></script>
@yield('script')
 

</body>
</html>
