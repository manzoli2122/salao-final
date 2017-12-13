<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'Salão') }}:: Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
  
    
    <link rel="shortcut icon" type="image/x-icon" href="/images/salao-icon.ico">
    <link href="{{ mix('css/vendor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('css/template.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style> 
      body {
          background-image: url("images/login-bg2.jpg") !important ;
          background-repeat: no-repeat !important;
          background-attachment: scroll !important;
          background-size: cover  !important;
      }
    </style>

</head>

<body class="hold-transition login-page" >
<div class="login-box">
  <div class="login-logo">
    <a style="color:white;" href="#"><b>Salao</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="background: none;">
    <h1 style="color:white;" class="login-box-msg">Faça seu Login</h1>

    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}

                        
        <div class="form-group has-feedback">
            <input type="email" id="email" name="email" class="form-control" style="background: black; color:white;" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" id="password" style="background: black; color:white;" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">
            
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Entrar</button>
        </div>
        <div class="col-xs-8" style="color:black;">
            <a style="color:white; font-size:20px;" href="{{ route('password.request') }}">Esqueci minha senha</a><br>
        </div>
        <!-- /.col -->
      </div>
    </form>


    
    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

  <script src="{{ mix('js/vendor.js') }}" type="text/javascript"></script>
    <script src="{{ mix('js/template.js') }}" type="text/javascript"></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>


</body>
</html>
