<!DOCTYPE html>
<html lang="en">

<head>
    <title>INDEX</title>
    <base href="{{ asset('') }}" target="_blank, _self, _parent, _top">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{('public/css/index.css')}}">
    <script src="{{('public/js/jquery.js')}}"></script>
    <script src="{{('public/bootstrap/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{('public/fontawesome-free-5.8.1-web/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{('public/css/animate.min.css')}}">
</head>

<body>
   <!--  begin header -->
    <div class="container-fluid">
      @include('header')
    </div>
         <!--    end header -->
     	@yield('content')
        <!-- FOOTER -->
        @include('footer')
</body>

</html>