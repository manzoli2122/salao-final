<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Salão | Recuperar senha</title>
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

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Salao</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Enviar Email para recuperar a senha</p>

    <form action="{{ route('password.email') }}" method="post">
        {{ csrf_field() }}

                        
        <div class="form-group has-feedback">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        

        <div class="row">
            <div class="col-xs-4">
            <a href="{{ route('login') }}" class="btn btn-warning btn-block btn-flat">Voltar</a>
            </div>
            <div class="col-xs-4">
            </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Enviar</button>
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
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


