@extends('layouts.app')

@section('content')
@include('alert')
<form class="form-horizontal" method="POST" action="{{ URL::to('Voter/update/'.$voter->id) }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="regNo" class="col-sm-3 control-label">reg Number</label>

      <div class="col-sm-9">
        <input type="text" value="={{ $voter->regNo }}" class="form-control" id="regNo" name="regNo" required>
      </div>
  </div>
  <div class="form-group">
      <label for="firstname" class="col-sm-3 control-label">Firstname</label>

      <div class="col-sm-9">
        <input type="text" value="{{ $voter->firstName }}" class="form-control" id="firstname" name="firstname" required>
      </div>
  </div>

  <div class="form-group">
      <label for="lastname" class="col-sm-3 control-label">Lastname</label>

      <div class="col-sm-9">
        <input type="text" value="{{ $voter->secondName }}" class="form-control" id="lastname" name="lastname" required>
      </div>
  </div>
  
 




<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Update</button>

</form>
   

    @endsection