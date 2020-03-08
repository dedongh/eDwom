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
                        <th>Brand ID</th>
                        <th>Brand Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($all_brand_info as $brand)
                        <tr>
                            <td>{{$brand->brand_id}}</td>
                            <td class="center">{{$brand->brand_name}}</td>
                            <td class="center">{{$brand->brand_description}}</td>
                            <td class="center">
                                @if($brand->publication_status == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($brand->publication_status == 1)
                                    <a class="btn btn-danger" href="{{URL::to('/unactive_brand/'.$brand->brand_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{URL::to('/active_brand/'.$brand->brand_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{URL::to('/edit-brand/'.$brand->brand_id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{URL::to('/delete-brand/'.$brand->brand_id)}}" id="delete">
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
