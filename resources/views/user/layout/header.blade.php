   <!-- ##### Header Area Start ##### -->
   <header class="header_area">
    <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
        <!-- Classy Menu -->
        <nav class="classy-navbar" id="essenceNav">
            <!-- Logo -->
            <a class="nav-brand" href="{{url('/')}}"><img src="{{url('user/img/logo.jpg')}}" alt="" style='width:50px;height:50px;'></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
                <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
                <!-- close btn -->
                <div class="classycloseIcon">
                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                </div>
                <!-- Nav Start -->
                <div class="classynav">
                    <ul>
                        <li><a href="{{ url('/') }}">Fashionista</a>
                            <div class="megamenu">
                                @foreach ($categories as $item)
                                <ul class="single-mega cn-col-4">
                                    <li class="title">{{ $item['name'] }}</li>
                                    @foreach ($item['subcategories_data'] as $sub)
                                    <li><a href="{{ url('category/'.$sub['id']) }}">{{ $sub['name'] }}</a></li>
                                    @endforeach
                                    
                                </ul>
                                @endforeach
                               
                               
                                <div class="single-mega cn-col-4">
                                    <img src="{{url('user/img/logo.jpg')}}" style="width:100px;height;100px" alt="">
                                </div>
                            </div>
                        </li>
                        <li><a href="{{ url('contact') }}">Contact</a></li>
                        <li id="logout_menu"></li>
                        
                    </ul>
                </div>
                <!-- Nav End -->
            </div>
        </nav>

        <!-- Header Meta Data -->
        <div class="header-meta d-flex clearfix justify-content-end">
            <!-- Search Area -->
            
            
            <!-- User Login Info -->
            <div class="user-login-info">
                <a href="#"><img src="{{ asset('user/img/core-img/user.svg') }}" alt=""></a>
            </div>
            <!-- Cart Area -->
            <div class="cart-area">
                <a href="#" onclick="show_cart()" id="essenceCartBtn"><img src="{{ asset('user/img/core-img/bag.svg') }}" alt="" > <span class="cart_count">0</span></a>
            </div>
        </div>

    </div>
</header>
<!-- ##### Header Area End ##### -->
