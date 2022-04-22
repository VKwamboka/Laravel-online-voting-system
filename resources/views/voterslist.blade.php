@extends('layouts.app')
@section('content')
@include('alert')
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><b>Add New voter</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{ URL::to('storeVoter') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                  <label for="regNo" class="col-sm-3 control-label">Reg Number</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="regNo" name="regNo" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                  </div>
              </div>
              
         
              <div class="form-group">
                  <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                  </div>
              </div>
           
             
             
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            </form>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered">
          <thead>
            <th>RegNumber</th>
            <th>First Name</th>
            <th>Second Name</th>
           
          </thead>
          <tbody>
        @isset($voters)
        @forelse ( $voters as $voter )
        <tr>
        
          <td>{{ $voter->regNo }}</td>
          <td>{{ $voter->firstName }}</td>
          <td>{{ $voter->secondName }}</td>
          
          <td>
            
            <a href="{{ url ('Voter/edit/'.$voter->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <a href="{{ url ('Voter/delete/'.$voter->id) }}" onclick="return window.confirm('delete this Voter ?')" class="btn btn-sm btn-danger">Delete</a>
            
       
        </tr>
        @empty
         
        @endforelse
        @endisset
      </tbody>
    </table> 


  @endsection