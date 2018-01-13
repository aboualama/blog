<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') - Aboualama</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
<body>
    <div id="app">

        @include('layouts.nav') 

        <!-- Page Content -->
        <div class="container"> 
            <div class="row"> 

                <!-- Blog Entries Column -->
                <div class="col-md-8">  
                    @include('layouts.errors') 
                    @yield('content') 
                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4"> 
                    @yield('sidebar') 
                </div>

            </div> 
        </div>
        
    </div>




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
