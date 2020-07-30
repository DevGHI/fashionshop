<!--
=========================================================
* Argon Dashboard PRO - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <meta name="author" content="Creative Tim">
  <title>@yield('title')</title>
  
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  {{-- <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css"> --}}
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.min.css?v=1.2.0')}}" type="text/css">
  {{-- ../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css --}}
  <!-- Google Tag Manager -->

  <!-- End Google Tag Manager -->

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@yield('css')
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  {{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> --}}
  <!-- End Google Tag Manager (noscript) -->
  <!-- Sidenav -->
  @include('layouts.site_admin.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
  
  {{-- @include('layouts.site_admin.navbar') --}}
  <!-- Main content -->
  @yield('content')
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

  
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  
  <script src="{{asset('assets/js/argon.min.js?v=1.2.0')}}"></script>
 
  {{-- My custom js########## --}}
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="{{ asset('js/customjs/token.js') }}"></script>
 <script src="{{ asset('js/customjs/CookieUtil.js') }}"></script>
 <script src="{{ asset('js/customjs/helper.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

{{--//success noti message alert plugin--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script>
    function logout(){
      document.cookie = 'token=; path='+'/'+'; expires=' + new Date(0).toUTCString();
      window.location.href=domain+'login';
    }





  </script>
  {{-- <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript> --}}

  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


  @yield('js')
</body>

</html>