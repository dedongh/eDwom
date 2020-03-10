@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Add Slider</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Slider</h2>
                <div class="box-icon">
                </div>
            </div>
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
                <form class="form-horizontal" action="{{url('/save-slider')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">Select slider image</label>
                            <div class="controls">
                                <input type="file" class="input-file uniform_on" required id="fileInput" name="slider_image">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="category_name">Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" checked class="input-xlarge" name="publication_status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Slider</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->

    </div><!--/row-->
@endsection
