  
    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{ url('user/img/core-img/bag.svg') }}" alt=""> <span class="cart_count2">0</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list" id="cart_item">

                <!-- Single Cart Item -->
                {{-- <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ url('user/img/product-img/product-1.jpg') }}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div> --}}

                

            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span id="subtotal">0</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>0%</span></li>
                    <li><span>total:</span> <span id="total">0</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <button class="btn essence-btn" onclick="check_login()">check out</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check_login(){
            var token=CookieUtil.get('user_token');
            if(token==null){
                window.location.href=domain+'user/login';
            }
            else{
                window.location.href=domain+'checkout'; 
            }

        }
        </script>
    <!-- ##### Right Side Cart End ##### -->