@extends('container')

@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
            $items = \Cart::getContent();
            //print_r($items);
            ?>
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $produts)
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="{{URL::to($produts->attributes->image)}}" alt="" style="height: 150px; width: 100px"></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$produts->name}}</a></h4>
                        <p>Web ID: 1089772</p>
                    </td>
                    <td class="cart_price">
                        <p>GHS {{$produts->price}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href=""> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$produts->quantity}}" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href=""> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">GHS {{$produts->getPriceSum()}}</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
