<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <!--  bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Theme style -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <style>
           body {
            background: url("https://c1.wallpaperflare.com/preview/742/346/328/pattern-wood-retro-desktop.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
         .card {
            background-size: cover;
            background-repeat: no-repeat;

            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
        }
        td {
  border: solid black;
  width: 100px;
  /* changing the value of the width here have no effect*/
  height: 7vh;
  min-width: 200px;
  /* changing the value of the width will work with min width bro*/
}
          </style>
    </head>
    <body>
    <div class="container" >

            <main class="py-4">
                @yield('content')
            </main>

    </div>


    <!-- Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    </body>


</html>
