@extends('layouts.app')

@section('content')
@include('alert')
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New Election</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ URL::to('elections/store') }}"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="electionname" class="col-sm-3 control-label">Election Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="electionname" name="electionname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label>

                        <div class="col-sm-9">
                          <select class="form-control" id="status" name="status" required>
                                <option value="" selected>- Select Election Status -</option>
                            
                                <option value='open'>open</option>
                            
                                <option value='closed'>closed</option>
                                
                            
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i>
                    Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>
                    New</a>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <th>electionId</th>
                        <th>Election name</th>
                        <th>status</th>
                        <th>Tools</th>
                    </thead>
                    <tbody>
                        @isset($elections)
                        @forelse( $elections as $elections)
                        <tr>

                            <td>{{ $elections-> id}}</td>
                            <td>{{ $elections-> electionname}}</td>
                            <td>{{ $elections-> status}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning"
                                    href="{{ url('/elections/edit/'.$elections->id) }}">Edit</a>
                                <a href="{{ url ('elections/delete/'.$elections->id) }}"
                                    onclick="return window.confirm('delete this position ?')"
                                    class="btn btn-sm btn-danger">Delete</a>
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