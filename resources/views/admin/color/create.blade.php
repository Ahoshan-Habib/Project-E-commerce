@extends('admin.admin_master')
@section('admin_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
        <div class="box span12" style="border-bottom-width: 100px">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Color</h2>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('/colors/')}}" method="post" >
                    @csrf
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Color</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge" name="color" required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Color</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection