<!DOCTYPE html>
        <html lang="{{ config('app.locale') }}">
        <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
        <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
        <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
        <!--[if gt IE 8]><!-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">

    
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    {{--<link rel="stylesheet" href="{{ mix('/css/all.css') }}">--}}
    <title>Altara CMS - Portal </title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <!--<script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>-->
    <![endif]-->

     <style>
           html, body {
                background-color: #fff;
                color: #003366;
                font-family: 'Lato', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
}
     </style>
    </head>
<body>
<div id="root">
    </div>
</body>


<script src="{{mix('/js/app.js')}}"></script>
{{--<script src="{{mix('/js/jquery.3.2.1.min.js')}}"></script>
<script src="{{mix('/js/popper.min.js')}}"></script>
<script src="{{mix('/js/bootstrap.min.js')}}"></script>
<script src="{{mix('/js/bootstrap-switch.js')}}"></script>
<script src="{{mix('/js/chartist.min.js')}}"></script>
<script src="{{mix('/js/bootstrap-notify.js')}}"></script>
<script src="{{mix('/js/jquery.sharrre.js')}}"></script>
<script src="{{mix('/js/jquery-jvectormap.js')}}"></script>
<script src="{{mix('/js/moment.min.js')}}"></script>
<script src="{{mix('/js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{mix('/js/sweetalert2.min.js')}}"></script>
<script src="{{mix('/js/bootstrap-tagsinput.js')}}"></script>
<script src="{{mix('/js/nouislider.js')}}"></script>
<script src="{{mix('/js/bootstrap-selectpicker.js')}}"></script>
<script src="{{mix('/js/jquery.validate.min.js')}}"></script>
<script src="{{mix('/js/jquery.bootstrap-wizard.js')}}"></script>
<script src="{{mix('/js/bootstrap-table.js')}}"></script>
<script src="{{mix('/js/jquery.dataTables.min.js')}}"></script>
<script src="{{mix('/js/fullcalendar.min.js')}}"></script>
<script src="{{mix('/js/light-bootstrap-dashboard790f.js')}}"></script>--}}

</html>
