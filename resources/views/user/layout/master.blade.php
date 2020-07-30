<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>@yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('user/img/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" > -->
    <link rel="stylesheet" href="{{ asset('user/css/core-style.css') }}">
    {{-- <link rel="stylesheet" href="style.css"> --}}

</head>

<body>
    @include('user.layout.header')
    @include('user.layout.cart')
    @yield('content')


    @include('user.layout.footer')
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('user/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{ asset('user/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('user/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('user/js/plugins.js')}}"></script>
    <!-- Classy Nav js -->
    <script src="{{ asset('user/js/classy-nav.min.js')}}"></script>
    <!-- Active js -->
    <script src="{{ asset('user/js/active.js')}}"></script>


    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/customjs/helper.js') }}"></script>
    <script src="{{ asset('js/customjs/CookieUtil.js') }}"></script>
    <script src="{{ asset('js/customjs/cart.js') }}"></script>
    
{{--//success noti message alert plugin--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    var li=document.getElementById('logout_menu');
    li.innerHTML="";
    if(CookieUtil.get('user_token')!=null){
      li.innerHTML=`
      <a class="nav-link" onclick="user_logout()">Logout</a>
      `;
    }
    function user_logout(){
      document.cookie = 'user_token=; path='+'/'+'; expires=' + new Date(0).toUTCString();
      window.location.href=domain;
    }
  </script>
@yield('js')

</body>

</html>