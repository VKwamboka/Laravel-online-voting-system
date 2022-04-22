@extends('layouts.app')
@section('content')
@include('alert')
<form class="form-horizontal" method="POST" action="{{ URL::to('positions/update/'.$singleposition->id) }}" enctype="multipart/form-data">
    @csrf
    
     
  <div class="form-group">
      <label for="positionName" class="col-sm-3 control-label">Name</label>

      <div class="col-sm-9">
        <input type="text" class="form-control" id="positionName" value="{{ $singleposition->positionName }}" name="positionName" required>
      </div>
  </div>
  <div class="form-group">
    <label for="max_contenstants" class="col-sm-3 control-label">Max-Contenstants</label>

    <div class="col-sm-9">
      <input type="text" class="form-control" id="max_contenstants" value="{{ $singleposition->max_contenstants }}" name="max_contenstants" required>
    </div>
</div>


  
 
 
  <button type="submit" class="btn btn-primary btn-flat ml-2" name="add"><i class="fa fa-save"></i> Update</button>
</form>
  
@endsection