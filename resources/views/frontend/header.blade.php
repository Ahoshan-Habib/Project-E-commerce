<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="{{'/'}}"><i class="fa fa-phone"></i> +880 1881875119</a></li>
                <li><a href="{{'/'}}"><i class="fa fa-envelope-o"></i> ahoshan344@gmail.com</a></li>
                <li><a href="{{'/'}}"><i class="fa fa-map-marker"></i> Chittagong,Bangladesh</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i ></i>&#2547; BDT</a></li>
                @php
                    $customer_id = Session::get('id');
                @endphp

                @if($customer_id!=Null)
                    <li><a href="{{ url('/cus-logout') }}"><i class="fa fa-user-o"></i> Logout</a></li>
                @else
                    <li><a href="{{ url('/login-check') }}"><i class="fa fa-user-o"></i> Login</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->
    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{'/'}}" class="logo">
                            <img src="./img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->
                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{url('/search')}}" method="get">
                            <select class="input-select" name="category">
                                <option value="ALL"{{request('category') == "ALL" ? 'selected' : ''}}>All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" {{request('category') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                               @endforeach
                            </select>
                            <input class="input" name="product" placeholder="Search here" value="{{request('product')}}"><button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->
                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        {{--<div>--}}
                            {{--<a href="#">--}}
                                {{--<i class="fa fa-heart-o"></i>--}}
                                {{--<span>Your Wishlist</span>--}}
                                {{--<div class="qty">2</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        <!-- /Wishlist -->
                        <!-- Cart -->
                        @php
                            $cart_array=cardArray();
                        @endphp
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty"><?= count($cart_array)?></div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach($cart_array as $v_add_cart)
                                        @php
                                            $images = null;  // Default value in case 'attributes' or index 0 is not found

                                            // Check if 'attributes' key exists and is an array
                                            if (isset($v_add_cart['attributes']) && is_array($v_add_cart['attributes'])) {
                                                // Check if index 0 exists in the 'attributes' array
                                                if (array_key_exists(0, $v_add_cart['attributes'])) {
                                                    // Access the value
                                                    $images = $v_add_cart['attributes'][0];
                                                    // Perform necessary operations
                                                    $images = explode('|', $images);
                                                    $images = $images[0];
                                                }
                                            }
                                        @endphp
                                        <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('/image/'.$images)}}">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$v_add_cart['name']}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$v_add_cart['quantity']}}x</span>&#2547;{{$v_add_cart['price']}}</h4>
                                        </div>
                                            <button class="delete" onclick="deleteCartItem('{{url('/delete-cart/'.$v_add_cart['id'])}}')">
                                                <i class="fa fa-close"></i>
                                            </button>
                                            <script>
                                                function deleteCartItem(url) {
                                                    window.location.href = url;
                                                }
                                            </script>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="cart-summary">
                                    <small><?= count($cart_array)?> Item(s) selected</small>
                                    <h5>SUBTOTAL:&#2547; {{Cart::getTotal()}}</h5>
                                </div>
                                <div class="cart-btns" style="#">
                                    @php
                                        $customer_id = Session::get('id');
                                    @endphp
                                    @if($customer_id!=Null)
                                    <a style="width: 100%; background-color: #D10024;" href="{{url('/checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                    @else
                                    <a style="width: 100%; background-color: #D10024;" href="{{url('/login-check')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->
                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>