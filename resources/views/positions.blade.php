@extends('layouts.app')

@section('content')
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button> --}}
            <h4 class="modal-title"><b>Add New Position</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{ URL::to('positions') }}" enctype="multipart/form-data">
                @csrf
                
          
              <div class="form-group">
                  <label for="positionName" class="col-sm-3 control-label">Name</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="positionName" name="positionName" required>
                  </div>
              </div>
              <div class="form-group">
                <label for="max_contenstants" class="col-sm-3 control-label">Max-Contenstants</label>

                <div class="col-sm-9">
                  <input type="text" class="form-control" id="max_contenstants" name="max_contenstants" required>
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
            <th>ElectionId</th>
            <th>Name</th>
            <th>Max-Contenstants</th>
            <th>Tools</th>
          </thead>
          <tbody>
        @isset($positions)
        @forelse( $positions as $positions)
        <tr>
        
          <td>{{ $positions-> id}}</td>
          <td>{{ $positions-> positionName}}</td>
          <td>{{ $positions-> max_contenstants}}</td>
          <td>
            <a   class="btn btn-sm btn-warning" href="{{ url('positions/edit/'.$positions->id) }}">Edit</a>
            <a href="{{ url ('positions/delete/'.$positions->id) }}"
              onclick="return window.confirm('delete this position ?')" class="btn btn-sm btn-danger">Delete</a>
          </td>
       
        </tr>
        @empty
         
        @endforelse
        @endisset
      </tbody>
    </table> 
      </div>
    </div>
  </div>
</div>

  @endsection