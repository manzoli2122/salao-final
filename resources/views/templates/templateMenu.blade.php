
        @permissao('clientes')
          <li>
            <a href="{{ route('clientes.index')}}">
              <i class="fa fa-id-card"></i> <span>Clientes</span>
            </a>
          </li>
         @endpermissao

         @permissao('caixa')
          <li>
            <a href="{{ route('atendimentos.index')}}">
              <i class="fa fa-id-card"></i> <span>Caixa</span>
            </a>
          </li>
         @endpermissao


         <li class="treeview">
          <a href="#"><i class="fa fa-dashboard"></i> <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                @permissao('servicos')
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('servicos.index')}}">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        Serviços
                      </a>
                    </li>
                @endpermissao				
                    
                @permissao('produtos')
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('produtos.index')}}">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                        Produtos
                      </a>
                    </li>
                @endpermissao	
					
                @permissao('operadoras')
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('operadoras.index')}}">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        Operadoras
                      </a>
                    </li>
                @endpermissao	
           
          </ul>
        </li>
        

        @permissao('despesas')            
          <li>                
            <a href="{{ route('despesas.index')}}"><i class="fa fa-id-card"></i> <span>Despesas</span></a>
          </li>
        @endpermissao

        @permissao('funcionarios')
          <li>
            <a href="{{ route('funcionarios.index')}}"><i class="fa fa-id-card"></i> <span>Funcionarios</span></a>
          </li>
        @endpermissao

       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Gerencial</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
            @permissao('usuarios')
              <li class="active">
                <a  href="{{ route('gerencialAtendimentos.index') }}"> <span class="sr-only">(current)</span>
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                  Atendimentos
                </a>
              </li>
            @endpermissao

            @permissao('usuarios')
              <li class="active">
                <a  href="{{ route('gerencial.relatorio.geral') }}" target="_blank"> <span class="sr-only">(current)</span>
                  <i class="fa fa-id-card" aria-hidden="true"></i>
                  Relatorio Geral
                </a>
              </li>
            @endpermissao
            
          </ul>
        </li>

