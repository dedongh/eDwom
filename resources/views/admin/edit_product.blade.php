@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Edit {{$product_info->product_name}}</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit {{$product_info->product_name}}</h2>
                <div class="box-icon">
                </div>
            </div>
            <p class="alert-success">
                <?php
                use Illuminate\Support\Facades\DB;use Illuminate\Support\Facades\Session;
                $message = Session::get('message');
                if ($message){
                    echo $message;
                    Session::put('message',null);
                }
                ?>
            </p>
            <div class="alert-danger">
                <?php

                $error = Session::get('error_message');
                if ($error){
                    echo $error;
                    Session::put('error_message',null);
                }
                ?>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/update-product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Name</label>
                            <div class="controls">
                                <input type="text" value="{{$product_info->product_name}}" class="input-xlarge" name="product_name" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <div class="controls">
                                <select id="selectError3" name="category_id" required>
                                    <option >Select category</option>
                                    <?php
                                    $all_published_category = DB::table('tbl_category')
                                        ->where('publication_status',1)
                                        ->get();

                                    foreach ($all_published_category as $category):
                                    ?>
                                    <option  <?= ($product_info->category_id == $category->category_id) ? 'selected' : ''  ?>  value="{{$category->category_id}}">{{$category->category_name}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Brand</label>
                            <div class="controls">
                                <select id="selectError3" name="brand_id" required>
                                    <option >Select brand</option>
                                    <?php
                                    $all_published_brands = DB::table('tbl_brands')
                                        ->where('publication_status',1)
                                        ->get();

                                    foreach ($all_published_brands as $brand):
                                    ?>
                                    <option  <?= ($product_info->brand_id == $brand->brand_id) ? 'selected' : ''  ?>  value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_price" value="{{$product_info->product_price}}" required>
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="category_description">Product short description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_short_description" rows="3" required>
                                    {{$product_info->product_short_description}}
                                </textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="category_description">Product long description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description" rows="3">
                                    {{$product_info->product_long_description}}
                                </textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Size</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_size" value="{{$product_info->product_size}}">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Color</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_color" value="{{$product_info->product_color}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Select product image</label>
                            <div class="controls">
                                <input type="file" class="input-file uniform_on" id="fileInput" name="product_image">
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <img src="{{URL::to($product_info->product_image)}}" alt="" style=" height: 100px" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="category_name">Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" checked class="input-xlarge" name="publication_status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
