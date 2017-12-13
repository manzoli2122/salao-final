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
