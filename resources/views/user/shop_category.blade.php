@extends('user.layout.master')

@section('title')
FashionShop | {{ $category }}
@endsection


@section('content')
  
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{ url('user/img/bg-img/breadcumb.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>{{ $category }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    @foreach ($categories as $item)
                                    <li data-toggle="collapse" data-target="#{{ $item['name'] }}">
                                        <a href="#" style="color: blue">{{ $item['name'] }}</a>
                                        <ul class="sub-menu collapse show" id="{{ $item['name'] }}">
                                            
                                            @foreach ($item['subcategories_data'] as $data)
                                            <li><a href="{{ url('category/'.$data['id']) }}">{{ $data['name'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li> 
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                       

                        <div class="row">
                        @foreach ($products['data'] as $item)
                             <!-- Single Product -->
                             <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{ $item['photo'][0]['photo_url']}}" alt="" style="height:350px;object-fit:cover">
                                        <!-- Hover Thumb -->
                                        @isset($record)
                                            
                                        @endisset
                                        {{-- <img class="hover-img" src="{{ url('user/img/product-img/product-2.jpg') }}" alt=""> --}}
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>{{ $item['subcategory']['name'] }}</span>
                                        <a href="{{ url('product/'.$item['id']) }}">
                                            <h6>{{ $item['name'] }}</h6>
                                        </a>
                                        <p class="product-price">{{ $item['price'] }} MMK</p>
        
                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn" onclick="add_to_cart({{ $item['id'] }})">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                           
                        </div>
                    </div>
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        {{ $products['paginate']->links() }}
                        {{-- <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul> --}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

@endsection