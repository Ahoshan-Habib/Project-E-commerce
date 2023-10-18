@extends('frontend.master')
@section('content')
    {{--<div class="section">--}}
        {{--<!-- container -->--}}
        {{--<div class="container">--}}
            {{--<!-- row -->--}}
            {{--<div class="row">--}}
            {{--@foreach($categories as $category)--}}
                {{--<!-- shop -->--}}
                {{--<div class="col-md-4 col-xs-6">--}}
                    {{--<div class="shop">--}}
                        {{--<div class="shop-img">--}}
                            {{--<img src="{{asset('/storage/'.$category->image)}}" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="shop-body">--}}
                            {{--<h3>{{$category->name}}<br>Collection</h3>--}}
                            {{--<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>--}}
                        {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
                    {{--<!-- shop -->--}}
                {{--@endforeach--}}
            {{--<!-- /row -->--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- /container -->--}}
    {{--</div>--}}
    <!-- /SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                @foreach($categories as $category)
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{asset('/storage/'.$category->image)}}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3><h3>{{$category->name}}<br>Collection</h3></h3>
                            <a href="{{url('/product_by_cat'.$category->id)}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach($categories as $category)
                                    <li class="#"><a href="{{url('/product_by_cat'.$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-2">

                                    @foreach($products as $product)
                                    <!-- product -->
                                    <!-- Multiple image separation -->
                                    @php
                                        $product['image']=explode('|',$product->image);
                                        $images=$product->image[0];
                                    @endphp
                                    <div class="product">
                                        <div class="product-img"><a href="{{url('/view-details'.$product->id)}}">
                                            <img src="{{asset('/image/'.$images)}}" style="width: 256px; height: 256px;">
                                            <div class="product-label">
                                                {{--<span class="sale">-30%</span>--}}
                                                {{--<span class="new">NEW</span>--}}
                                            </div></a>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><a href="{{url('/view-details'.$product->id)}}">{{$product->category->name}}</a></p>
                                            <h3 class="product-name"><a href="{{url('/view-details'.$product->id)}}">{{$product->name}}</a></h3>
                                            <h4 class="product-price"><a href="{{url('/view-details'.$product->id)}}">&#2547;{{$product->price}}<del class="product-old-price">&#2547;{{$product->price}}</del></a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>
                                        <form action="{{url('add-to-cart')}}" method="post">
                                        @csrf
                                            <div class="add-to-cart">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /product -->
                                        @endforeach
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        {{--<ul class="hot-deal-countdown">--}}
                            {{--<li>--}}
                                {{--<div>--}}
                                    {{--<h3>02</h3>--}}
                                    {{--<span>Days</span>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div>--}}
                                    {{--<h3>10</h3>--}}
                                    {{--<span>Hours</span>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div>--}}
                                    {{--<h3>34</h3>--}}
                                    {{--<span>Mins</span>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<div>--}}
                                    {{--<h3>60</h3>--}}
                                    {{--<span>Secs</span>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        <h2 class="text-uppercase">Shop Smart, Shop Heart</h2>
                        <p>Your Style, Our Passion</p>
                        <a class="primary-btn ">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach($categories as $category)
                                    <li><a href="{{url('/product_by_cat'.$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->




                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">

                                @foreach($topProducts as $topProduct)
                                    <!-- product -->
                                        <!-- Multiple image separation -->
                                        @php
                                            $topProduct['image']=explode('|',$topProduct->image);
                                            $images=$topProduct->image[0];
                                        @endphp
                                        <div class="product">
                                            <div class="product-img"><a href="{{url('/view-details'.$topProduct->id)}}">
                                                    <img src="{{asset('/image/'.$images)}}" style="width: 256px; height: 256px;">
                                                    <div class="product-label">
                                                        {{--<span class="sale">-30%</span>--}}
                                                        {{--<span class="new">NEW</span>--}}
                                                    </div></a>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><a href="{{url('/view-details'.$topProduct->id)}}">{{$topProduct->category->name}}</a></p>
                                                <h3 class="product-name"><a href="{{url('/view-details'.$topProduct->id)}}">{{$topProduct->name}}</a></h3>
                                                <h4 class="product-price"><a href="{{url('/view-details'.$topProduct->id)}}">&#2547;{{$topProduct->price}}<del class="product-old-price">&#2547;{{$topProduct->price}}</del></a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                </div>
                                            </div>
                                            <form action="{{url('add-to-cart')}}" method="post">
                                                @csrf
                                                <div class="add-to-cart">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="id" value="{{$topProduct->id}}">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->



            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->

@endsection
