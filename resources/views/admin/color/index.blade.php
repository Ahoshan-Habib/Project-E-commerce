@extends('admin.admin_master')
@section('admin_content')

    <p class="alert-success">
        <?php
        $message= Session::get('message');
        if($message){
            echo $message;
            Session::put('message',null);
        }
        ?>
    </p>
    <div class="row-fluid sortable">
        <div class="box span12" style="min-height: 600px">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th style="width: 10%;">ID</th>
                        <th style="width: 30%;">Color</th>
                        <th style="width: 20%;">Status</th>
                        <th style="width: 40%;">Actions</th>
                    </tr>
                    </thead>
                    @foreach($colors as $color)
                        <tbody>
                        <tr>
                            <td>{{$color->id}}</td>
                            <td class="center">{{$color->color}}</td>
                            <td class="center">
                                @if($color->status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Deactive</span>
                                @endif
                            </td>
                            <td class="row">
                                <div class="span3"></div>
                                <div class="span2">
                                    @if($color->status==1)
                                        <a href="{{url('/color-status'.$color->id)}}" class="btn btn-success" >
                                            <i class="halflings-icon white thumbs-down"></i>
                                        </a>
                                    @else
                                        <a href="{{url('/color-status'.$color->id)}}" class="btn btn-danger" >
                                            <i class="halflings-icon white thumbs-up"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="span2">
                                    <a class="btn btn-info" href="{{url('/colors/'.$color->id.'/edit')}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a></div>
                                <div class="span2">
                                    <form method="post" action="{{url('/colors/'.$color->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="halflings-icon white trash"></i></button>
                                    </form>
                                </div>
                                <div class="span3"></div>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->

@endsection