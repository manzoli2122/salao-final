@extends('templates.templateMaster')



@section('titulo-page')

Altera a Senha

@endsection


@section('contentMaster')

            <h1 style="color:white; text-align: center"> Alterar Senha</h1>


            {!! Form::model($user , ['route' => ['senha.update' ],  'class' => 'form form-search form-ds'])!!}
            
				<div class="form-group">
                    {!! Form::password('password' , ['placeholder' => 'Senha', 'class' => 'form-control'])!!}
				</div>
				<div class="form-group">
                    {!! Form::password('password_confirmation' , ['placeholder' => 'Confirmar Senha', 'class' => 'form-control'])!!}
				</div>
				
				<div class="form-group">
                    {!! Form::submit('Enviar' , ['class' => 'btn btn-search']) !!}
				</div>
            {!! Form::close()!!}



@endsection