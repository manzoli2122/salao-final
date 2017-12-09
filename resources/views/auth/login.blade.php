<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Salão | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url( mix('/css/vendor.css'))}}"> 
 
    <link rel="stylesheet" href="{{url('/plugins/iCheck/square/green.css')}}">

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


<script src="{{url( mix('/js/vendor.js'))}}"></script>
<!-- iCheck -->
<script src="{{url('/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
</script>

</body>
</html>
