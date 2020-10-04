@extends('layouts.allpage.home')
@section('title')
Shop page
@endsection
@section('content')
 <!-- Page Title area start -->
 <div class="page-tile-area py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Title area start -->
<div class="shop-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- widget with Number start -->
                <div class="widget-area ">
                    <ul id="myUL">
                        <!-- Title with underline-->
                        <div class="main-title-with-underline pb-4 mt-0">
                            <h4>categories</h4>
                        </div>
                        <!---  Furniture option-->
                        <li>
                            <div class="caret title active">electical</div>
                            <ul class="nested">
                                @foreach($shop_category as $scategory)
                                <li><a href="{{ route('shop.view.category',$scategory->id) }}">{{ $scategory->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <!---  Color option End-->
                        <!---  Chairs & sofas-->
                        {{-- <li>
                            <div class="caret title">Chairs & sofas</div>
                            <ul class="nested">
                                <li><a href="#">Sofas</a></li>
                                <li><a href="#">Lounge chairs & ottomans</a></li>
                                <li><a href="#"> Sofa armchairs</a></li>
                                <li><a href="#"> Sofa beds</a></li>
                            </ul>
                        </li> --}}
                        <!---  Chairs & sofas End-->

                        <!-- Title with underline-->

                        <!---  color options-->

                        <!---  color options End-->
                        <!--- Size options-->

                </div>
                <!-- widget Number End  -->

            </div> <!-- Col-3  end-->
            <div class="col-lg-9">
                <!-- Banner area start  -->
                <div class="banner-area">
                    <img src="img/banner-img/banner2.jpg" alt="" class="img-fluid">
                </div>
                <!-- Banner area  End-->
                <!-- List view and grid view tab start-->
                <div class="shop-layout-area py-5">
                    <div class="shop-layout-bar clearfix ">
                        <ul class="nav shop-tap" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link  active" data-toggle="tab" href="#grid-view" role="tab">
                                    <i class="fas fa-th-large"></i>
                                </a>
                            </li>
                            <li class="nav-item">

                            </li>
                        </ul>

                        <div class="showing-result">
                            <span>Showing 1-12 of 30 relults</span>
                        </div>

                    </div>
                    <!-- tab content-->
                    <div class="tab-content pt-4">
                        <!-- tab grid content-->
                        <div class="tab-pane  active show fade" id="grid-view" role="tabpanel">
                            <div class="row">
                                @foreach($shop_product1 as $sproduct)
                                <div class="col-md-4">
                                    <!--Single product start-->
                                    <div class="product-wrapper">
                                        <div class="product-img">
                                            <a href="#"> <img src="{{ $sproduct->image }}" alt=""></a>
                                            <a href="#"> <img class="secondary-img"
                                                    src="img/product-img/product1.jpg" alt=""></a>
                                            <span>hot</span>
                                            <div class="product-action">
                                                <a href="#"><i class="far fa-eye"></i></a>
                                                <a href="#"><i class="fas fa-balance-scale"></i></a>
                                                <a href="#"><i class="fas fa-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <h3><a href="#">{{ $sproduct->product_name }}</a></h3>
                                            <div class="rating">
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                                <i class="fas far fa-star"></i>
                                            </div>
                                            <div class="price">
                                                <span>{{ $sproduct->price }} </span>
                                                <span><del>$239.9</del></span>
                                            </div>
                                            <div class="cart-btn">
                                                <a href="{{ route('product.deteils',$sproduct->id) }}">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single product End-->
                                </div>
                                @endforeach

                            </div>
                            {{ $shop_product1->links() }}
                        </div>
                        <!-- tab list content-->

                    </div>
                </div>
                <!-- List view and grid view tab End-->
            </div>
        </div>
    </div>
</div>



@endsection
