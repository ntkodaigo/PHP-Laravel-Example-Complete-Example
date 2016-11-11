<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Project Monterrey @yield('title')</title>
        <!--@section('title', 'name')-->
        <!-- Fonts change to https://developers.google.com/fonts/docs/developer_api-->
        <!--link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"-->

        <!-- Bootstrap -->
        
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <!-- Latest compiled and minified JavaScript -->

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
             
        
        <!-- jQuery -->
        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
        <!-- Bootstrap JavaScript -->
        <script src="{{ URL:: asset('js/bootstrap.min.js') }}"></script>

        <script src="{{ URL:: asset('js/bootstrap-datepicker.min.js') }}"></script>

        <script src="{{ URL:: asset('locales/bootstrap-datepicker.es.min.js') }}"></script>

        <!-- App scripts -->
        @stack('scripts')


        



        @yield('footer')



    </body>
</html>
