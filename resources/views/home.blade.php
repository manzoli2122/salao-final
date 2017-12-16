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


@section('content')

<section class="row text-center Listagens">
        
		<div class="col-12 col-sm-8 lista">							
			<div class="col-12 col-sm-12 lista">
                    <br>
                    
                    <p> Para cadastro de <b> Produto, Serviço ou Operadora de cartão</b> selecionar o Cadastro no menu lateral da sua tela </p>
                    
                    <br>
                    <p> Para recebimento de <b>Serviços anteriores</b> acesse o clientes e no menu Lateral, caso esteja a dívida cadastrada no sistema, aparecerá o valor da dívida. </p>
                    
                    <br><br>
			
			</div>
			
			<div class="col-12 col-sm-12 lista">	
				
				
			</div>

			
			<div class="row" style="margin-top:800px">
				<div class="col-md-12">
				<!-- Line chart -->
				<div class="box box-primary">
					<div class="box-header with-border">
					<i class="fa fa-bar-chart-o"></i>

					<h3 class="box-title">Controle dos ultimos 30 dias</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
					</div>
					<div class="box-body">
					<div id="line-chart" style="height: 300px;"></div>
					</div>
					<!-- /.box-body-->
				</div>
				</div>
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





@push('script')

<!--script src="/js/Chart.js"></script>

<script src="/js/fastclick.js"></script-->

<script src="/js/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/js/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="/js/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="/js/jquery.flot.categories.js"></script>





<script>
  $(function () {
    
    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = [] , despesas = []
    var ip = 0;
		@for ($i = 30; $i > 0; $i-- )
				sin.push([ ip , {{ Manzoli2122\Salao\Atendimento\Models\Atendimento::whereBetween('created_at', [  today()->subDays(30) , today()->subDays($i)   ])->sum('valor') }}   ])
				cos.push([ ip , {{ Manzoli2122\Salao\Atendimento\Models\Pagamento::whereBetween('created_at', [  today()->subDays(30) , today()->subDays($i)    ])->where('formaPagamento','<>', 'fiado')->sum('valor') }}   ])
				despesas.push([ ip , {{ Manzoli2122\Salao\Despesas\Models\Despesa::whereBetween('created_at', [  today()->subDays(30) , today()->subDays($i)    ])->sum('valor') }}   ])
				ip = ip + 1;
		@endfor
	

    var line_data1 = {
      data : sin,
      color: '#3c8dbc'
    }
    var line_data2 = {
      data : cos,
      color: '#00c0ef'
    }
		var line_data3 = {
      data : despesas,
      color: '#900000'
    }



    $.plot('#line-chart', [line_data1, line_data2 , line_data3 ], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({ top: item.pageY + 5, left: item.pageX + 5 })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */

  })

 
</script>




@endpush
