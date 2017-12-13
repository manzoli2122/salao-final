<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SGPM-DOC') }} :: @yield('content-header')</title>

    <link href="{{ mix('css/vendor.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('css/template.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @stack('styles')

    <script type="text/javascript">
        // Variáveis globais para todos os scripts
        URL_ROOT = "{{url('/')}}";
    </script>

    <style>
        
    </style>
    
</head>

<body class="hold-transition skin-blue-light sidebar-mini">

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
    
        @include('layouts.header')
        @include('layouts.sidebar')

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

        @include('layouts.footer')
    </div>

    <script src="{{ mix('js/vendor.js') }}" type="text/javascript"></script>
    <script src="{{ mix('js/template.js') }}" type="text/javascript"></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

    @stack('scripts')
</body>

</html>