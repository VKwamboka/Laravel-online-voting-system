@extends('layouts.app')
@section('content')
@include('alert')
<form class="form-horizontal" method="POST" action="{{ URL::to('/elections/update/'.$singleelction->id) }}"
    enctype="multipart/form-data">
    @csrf


    <div class="form-group">
        <label for="electionname" class="col-sm-3 control-label">Election Name</label>

        <div class="col-sm-9">
            <input type="text" class="form-control" id="electionname" value="{{ $singleelction->electionname }}"
                name="electionname" required>
        </div>
    </div>
    <div class="form-group">
        <label for="status" class="col-sm-3 control-label">status</label>

        <div class="col-sm-9">
           <select class="form-control" id="status" name="status" required>
                    <option value="" selected>- Select Election Status -</option>
                
                    <option value='open'>open</option>
                
                    <option value='closed'>closed</option>
                
                
                </select>
        </div>
    </div>





    <button type="submit" class="btn btn-primary btn-flat ml-2" name="add"><i class="fa fa-save"></i> Update</button>
</form>

@endsection