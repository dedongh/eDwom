@extends('shop')

@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        @foreach($product_by_brand as $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to($product->product_image)}}" alt="" style=" height: 300px"/>
                            <h2>GHS {{$product->product_price}}</h2>
                            <p>{{$product->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>GHS {{$product->product_price}}</h2>
                                <p>{{$product->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>{{$product->category_name}}</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>View Product</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--features_items-->


@endsection
