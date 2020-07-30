@extends('user.layout.master')

@section('title')
    Home
@endsection


@section('content')
       
        <!-- ##### Welcome Area Start ##### -->
        <section class="welcome_area bg-img background-overlay" style="background-image: url({{ url('user/img/bg-img/bg-1.jpg') }});">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="hero-content">
                            <h6>welcome</h6>
                            <h2>Fashionista</h2>
                            <a href="#aa" class="btn essence-btn">view collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Welcome Area End ##### -->
    
        <!-- ##### Top Catagory Area Start ##### -->
        <div class="top_catagory_area section-padding-80 clearfix">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Single Catagory -->
                    @foreach ($categories as $item)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ $item['photo'] }});">
                            <div class="catagory-content">
                                <a href="#">{{ $item['name'] }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                   
                </div>
            </div>
        </div>
        <!-- ##### Top Catagory Area End ##### -->
    
        <!-- ##### CTA Area Start ##### -->
        <div class="cta-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cta-content bg-img background-overlay" style="background-image: url({{ url('user/img/product-img/product-8.jpg') }});">
                            <div class="h-100 d-flex align-items-center justify-content-end">
                                <div class="cta--text">
                                    <h6>-60%</h6>
                                    <h2>Global Sale</h2>
                                    <a href="#" class="btn essence-btn">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### CTA Area End ##### -->
        @foreach ($categories as $main)
       
            
       
       <a href="#aa" id="aa"><a>
        @foreach ($main['subcategories_data'] as $item)
        @if(count($item['product_data'])!=0)
        <!-- ##### New Arrivals Area Start ##### -->
        <section class="new_arrivals_area section-padding-80 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-center">
                            <a href="{{ url('category/'.$item['id']) }}"><h2>{{ $item['name'] }}</h2></a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="popular-products-slides owl-carousel">
                            @foreach ($item['product_data'] as $product)
                                  <!-- Single Product -->
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{ $product['photo'][0]['photo_url']}}" alt="" style="height:350px;object-fit:cover">
                                    <!-- Hover Thumb -->
                                    {{-- <img class="hover-img" src="{{ url('user/img/product-img/product-2.jpg') }}" alt=""> --}}
                                    <!-- Favourite -->
                                    <div class="product-favourite">
                                        <a href="#" class="favme fa fa-heart"></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <span>{{ $product['subcategory']['name'] }}</span>
                                    <a href="{{ url('product/'.$product['id']) }}">
                                        <h6>{{ $product['name'] }}</h6>
                                    </a>
                                    <p class="product-price">{{ $product['price'] }}</p>
    
                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <div class="add-to-cart-btn">
                                            <button class="btn essence-btn" onclick="add_to_cart({{ $product['id'] }})">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                          
    
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### New Arrivals Area End ##### -->
        @endif
        @endforeach
       
        @endforeach



     <!-- ##### New Arrivals Area Start ##### -->
     {{-- <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>New Products</h2>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container">
            <div class="row">
                <div class="row">
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-1.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-2.jpg') }}" alt="">
    
                                <!-- Product Badge -->
                                <div class="product-badge offer-badge">
                                    <span>-30%</span>
                                </div>
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-2.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-3.jpg') }}" alt="">
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-3.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-4.jpg') }}" alt="">
    
                                <!-- Product Badge -->
                                <div class="product-badge new-badge">
                                    <span>New</span>
                                </div>
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-4.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-5.jpg') }}" alt="">
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-5.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-6.jpg') }}" alt="">
    
                                <!-- Product Badge -->
                                <div class="product-badge offer-badge">
                                    <span>-30%</span>
                                </div>
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-6.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-7.jpg') }}" alt="">
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-7.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-8.jpg') }}" alt="">
    
                                <!-- Product Badge -->
                                <div class="product-badge new-badge">
                                    <span>New</span>
                                </div>
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-8.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-9.jpg') }}" alt="">
                                
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ url('user/img/product-img/product-9.jpg') }}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ url('user/img/product-img/product-1.jpg') }}" alt="">
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
    
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6>Knot Front Mini Dress</h6>
                                </a>
                                <p class="product-price">$80.00</p>
    
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ##### New Arrivals Area End ##### -->
    
@endsection