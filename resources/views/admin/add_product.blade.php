@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Add Products</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Products</h2>
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
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_name" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category</label>
                            <div class="controls">
                                <select id="selectError3">
                                    <?php
                                    $all_published_category = DB::table('tbl_category')
                                        ->where('publication_status',1)
                                        ->get();

                                    foreach ($all_published_category as $category):
                                    ?>
                                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Brand</label>
                            <div class="controls">
                                <select id="selectError3">
                                    <?php
                                    $all_published_brands = DB::table('tbl_brands')
                                        ->where('publication_status',1)
                                        ->get();

                                    foreach ($all_published_brands as $brand):
                                        ?>
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Price</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_price" required>
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="category_description">Product short description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_short_description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="category_description">Product long description</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Size</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_size" >
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="category_name">Product Color</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="product_color" >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Select product image</label>
                            <div class="controls">
                                <input type="file" class="input-file uniform_on" id="fileInput" name="product_image">
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
