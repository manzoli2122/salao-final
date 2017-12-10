@extends('templates.templateMaster')


@section('css')
<style>
    .content {
        background-image: url('images/logo-vip.png')!important ;
          background-repeat: no-repeat !important;
          background-attachment: scroll !important;
          background-size: cover  !important;
    }
</style>
@endsection



@section('titulo-page')
Bem Vindo ao Sistema do Salão Espaço Vip
@endsection


@section('small-titulo-page')
É um prazer Servir!!!!
@endsection


@section('contentMaster')

<section class="row text-center Listagens">
        
		<div class="col-12 col-sm-8 lista">							
			<div class="col-12 col-sm-12 lista">
                    <br>
                    
                    <p> Para cadastro de <b> Produto, Serviço ou Operadora de cartão</b> selecionar o Cadastro no menu lateral da sua tela </p>
                    
                    <br>
                    <p> Para recebimento de <b>Serviços anteriores</b> acesse o clientes e no menu Lateral, caso esteja a dívida cadastrada no sistema, aparecerá a opção receber dívida. </p>
                    
                    <br><br>
			
			</div>
			
			<div class="col-12 col-sm-12 lista">	
				
				
			</div>
        </div>      

		<div class="col-12 col-sm-4 lista">	

			<div class="col-12 col-sm-12 lista">				
				<table class="table table-bordered table-sm">
					<tr class="thead-dark">
						<th>Aniversariantes do mês</th>
							<th>Dia</th>								
					</tr>					
					@forelse( Manzoli2122\Salao\Atendimento\Models\Cliente::whereMonth('nascimento',  now()->month )
												->get()->sortBy(function ($usuario, $key) {
															
															return $usuario['nascimento']->day;
														}) as $user)
						<tr>						
							<td> {{$user->name}}</td>	

							<td> @if(isset($user->nascimento)) {{$user->nascimento->format('d/m')}} @endif </td>
						</tr>
					@empty
						<tr>						
							<td>Nenhum usuario encontrado</td>
						</tr>
					@endforelse
				</table>
			</div>

			<div class="col-12 col-sm-12 lista">							
				<table class="table table-bordered table-sm">
					<tr class="thead-dark">
						<th>Estatisticas</th>
							<th>Valor</th>					
					</tr>
					<tr>						
						<td> Total de clientes</td>						
						<td> {{ App\User::count() }} </td>
					</tr>
					<tr>						
						<td> Novos Clientes</td>						
						<td> {{ App\User::whereBetween('created_at', [  now()->subMonth() , now()   ])->count() }} </td>
					</tr>
					<tr>						
						<td> Total de Tipos de Serviços</td>						
						<td> {{ Manzoli2122\Salao\Cadastro\Models\Servico::ativo()->count() }} </td>
					</tr>
					<tr>						
						<td> Total de Produtos </td>						
						<td> {{ Manzoli2122\Salao\Cadastro\Models\Produto::ativo()->count() }} </td>
					</tr>
				</table>				
			</div>

        </div>
</section>

@endsection
