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
           // \Cart::clearCartConditions()
            //print_r($items);
            $conditions = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'VAT 12.5%',
                'type' => 'tax',
                'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => '12.5%',
                'attributes' => array( // attributes field is optional
                    'description' => 'Value added tax',
                    'more_data' => 'more data here'
                )
            ));

            \Cart::condition($conditions)
            ?>
            <table class="table table-condensed  table-responsive">
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
                            <a href=""><img src="{{URL::to($produts->attributes->image)}}" alt=""
                                            style="height: 100px; width: 80px"></a>
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
                                <a class="cart_quantity_up" href="{{URL::to('/update-qty-up/'.$produts->id.'/'.$produts->quantity)}}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity"
                                       value="{{$produts->quantity}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="{{URL::to('/update-qty-down/'.$produts->id.'/'.$produts->quantity)}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">GHS {{$produts->getPriceSum()}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$produts->id)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('do_more')
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Ghana</option>
                                <option>UK</option>
                                <option>Canada</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Accra</option>
                                <option>London</option>
                                <option>New York</option>
                                <option>Virginia</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{\Cart::getSubTotal()}}</span></li>
                        <li>Tax <span>{{$conditions->getValue()}}</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>GHS {{\Cart::getTotal()}}</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="{{URL::to('/login')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
@endsection
