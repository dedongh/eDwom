@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Brands</a></li>
    </ul>
    <p class="alert-success">
        <?php
        use Illuminate\Support\Facades\Session;
        $message = Session::get('message');
        if ($message){
            echo $message;
            Session::put('message',null);
        }
        ?>
    </p>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                      {{--  <th>Description</th>--}}
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($all_product_info as $product)
                        <tr>
                            <td>{{$product->product_id}}</td>
                            <td class="center">{{$product->product_name}}</td>
                           {{-- <td class="center">{{$product->product_short_description}}</td>--}}
                            <td class="center"><img src="{{URL::to($product->product_image)}}" style="height: 100px; width: 80px" ></td>
                            <td class="center">GHS {{$product->product_price}}</td>
                            <td class="center">{{$product->category_name}}</td>
                            <td class="center">{{$product->brand_name}}</td>
                            <td class="center">
                                @if($product->publication_status == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($product->publication_status == 1)
                                    <a class="btn btn-danger" href="{{URL::to('/unactive_product/'.$product->product_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{URL::to('/active_product/'.$product->product_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{URL::to('/edit-product/'.$product->product_id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{URL::to('/delete-product/'.$product->product_id)}}" id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
