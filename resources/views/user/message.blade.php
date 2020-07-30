@extends('user.layout.master')

@section('title')
    FashionShop 
@endsection

@section('content')
<div class="contact-area d-flex align-items-center">

   <div style="margin: 500px;">

    <h2>{{ $message }}</h2>
   </div>
   <br><br><br><br><br>
</div>

@endsection

@section('js')
<script>
    Swal.fire({
               position: 'top-end',
               icon: 'success',
               title: 'Order Succes!.',
               showConfirmButton: false,
               timer: 1500
             });
             document.cookie = 'cart=; path='+'/'+'; expires=' + new Date(0).toUTCString();
             show_count();
</script>   
@endsection