@extends('user.layout.master')

@section('title')
    FashionShop | Checkout
@endsection

@section('content')
  <!-- ##### Breadcumb Area Start ##### -->
  <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Billing Address</h5>
                    </div>

                    <form action="" id="order_form" method="post">
                        <input type="hidden" name="web" value="1">
                        <input type="hidden" name="user_id" value="{{ $user_info['user_id'] }}">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">Name <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" value="{{ $user_info['name'] }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Phone <span>*</span></label>
                                <input type="tel" class="form-control" id="last_name" value="{{ $user_info['phone'] }}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="township_id">Township <span>*</span></label><br>
                                <select name="township_id" class="form-control"  id="township_id" required style="width: 100%">
                                    <option value="{{ $user_info['township_id'] }}" selected>{{ $user_info['township_name'] }}</option>
                                    @foreach ($township as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Address <span>*</span></label>
                                <input type="text" name="address" class="form-control mb-3" id="street_address" value="{{ $user_info['address'] }}" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="street_address">Receive Date <span>*</span></label>
                                <input type="date" name="receive_date" class="form-control mb-3" id="receive_date" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="street_address">Receive Time <span>*</span></label>
                                <input type="time" name="receive_time" min="9:00" max="17:00" class="form-control mb-3" id="street_address" required>
                            </div><br>

                            <div class="col-12 mb-12">
                                <label for="street_address">Payment Type <span>*</span></label><br>
                                <div class="">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox1" checked value="cash" name="type">
                                    <label class="form-check-label" for="inlineCheckbox1">Cash</label>
                                  </div>
                                 
                            </div>
                            <div style="display: none">
                            {{ $i=0 }}
                            @foreach ($cart as $item)
                                <input type="hidden" name="product_id[{{ $i }}]" value="{{ $item }}">
                                <input type="hidden" name="quantity[{{ $i }}]" value="1">
                                {{ $i++ }}
                            @endforeach
                            </div><br>
                           <input type="submit" value="Order" class="btn form-control" style="background: blue;color:white">
                        </div>
                    </form>
                </div>
            </div>

         
        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection

@section('js')
<script>
    var form=document.getElementById('order_form');
    form.setAttribute('action',domain+'api/orders');
    var today=getDate();
    document.getElementById('receive_date').setAttribute('min',today);
   function getDate() {
        var today = new Date();
        var dd = today.getDate()+1;
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        }

        if(mm<10) {
            mm = '0'+mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        return today;
    }
    </script>

@endsection