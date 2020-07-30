@extends('user.layout.master')

@section('title')
FashionShop | {{ $product['name'] }}
@endsection


@section('content')
  

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                
                @foreach ($product['photo'] as $item)
                @if (count($product['photo'])==1)
                <img src="{{ $item['photo_url'] }}" alt="" style="height: 600px;width:100%;object-fit:cover">    
                @endif
                <img src="{{ $item['photo_url'] }}" alt="" style="height: 600px;width:100%;object-fit:cover">
                @endforeach
                {{-- <img src="{{ url('user/img/product-img/product-big-1.jpg') }}" alt="" style="height: 600px;width:100%;object-fit:cover"> --}}
                
            
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>{{ $product['subcategory']['name'] }}</span>
            {{-- <a href="cart.html"> --}}
                <h2>{{ $product['name'] }}</h2>
            {{-- </a> --}}
            <p class="product-price">{{ $product['price'] }}MMK</p>
            <p class="product-desc">{{ $product['detail'] }}</p>

            <!-- Form -->
            <div class="cart-form clearfix">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="color_name" id="productSize" class="mr-5">
                        @foreach (json_decode($product['color_name']) as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <select name="size_name" id="productSize" class="mr-5">
                        @foreach (json_decode($product['size_name']) as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="buton" onclick="add_to_cart({{ $product['id'] }})"name="addtocart" value="5" class="btn essence-btn">Add to cart</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->


@endsection