@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{URL::to('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Sliders</a></li>
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
                        <th>Slider ID</th>
                        <th>Slider Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($all_slider_info as $slider)
                        <tr>
                            <td>{{$slider->slider_id}}</td>
                            <td class="center"><img src="{{URL::to($slider->slider_image)}}" style="height: 100px; width: 250px" ></td>
                            <td class="center">
                                @if($slider->publication_status == 1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($slider->publication_status == 1)
                                    <a class="btn btn-danger" href="{{URL::to('/unactive_slider/'.$slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{URL::to('/active_slider/'.$slider->slider_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                               {{-- <a class="btn btn-info" href="{{URL::to('/edit-slider/'.$slider->slider_id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>--}}
                                <a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$slider->slider_id)}}" id="delete">
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
