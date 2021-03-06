<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('content-header') :: {{ config('app.name', 'Salão') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="/images/salao-icon.ico">
    <link href="{{ mix('css/vendor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('css/template.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @stack('styles')

    <script type="text/javascript">
        // Variáveis globais para todos os scripts
        URL_ROOT = "{{url('/')}}";
    </script>

</head>

<body class="hold-transition skin-green sidebar-mini">

    <!-- Mensagens de Sucesso -->
    @if (\Session::has('success'))
        <input type="hidden" id="_success" value="{{ \Session::pull('success') }}">
    @endif

    <!-- Mensagens de ERRO -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <input type="hidden" name="_errors[]" value="{{ $error }}">
        @endforeach
    @endif




    <div class="wrapper">
    
        @include('templates.header')
        @include('templates.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('content-header')
                    <small>@yield('small-content-header')</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    @yield('content')
                </div>
            </section>
        </div>
        @include('templates.footer')
    </div>

    <script src="{{ mix('js/vendor.js') }}" type="text/javascript"></script>
    <script src="{{ mix('js/template.js') }}" type="text/javascript"></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    @stack('script')
</body>

</html>