@extends('layouts.app')

@section('content')
@include('alert')
<div class="modal fade" id="addnewcandidate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Add New poll</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{ URL::to('storepoll') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Title" class="col-sm-3 control-label">Title</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Description" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="answers" class="col-sm-3 control-label">answers(per)line</label>
                        <div class="col-sm-9">
                            <textarea name="answers" class="form-control" id="answers" placeholder="answers" required>

                            </textarea>
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
<div class="content home">
    <h2>Polls</h2>
  
    <a href="#addnewcandidate" data-toggle="modal" class="create-poll">Create Poll</a>
    <table>
        <thead>
            <tr>
                <td>#sNo</td>
                <td>Title</td>
                <td>Description</td>
                <td>Answers</td>
                <td>Tools</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($allpolls as $poll )
            <tr>
                <td>{{$poll->id}}</td>
                <td>{{$poll->title}}</td>
                <td>{{$poll->description}}</td>
               
                <td>{{$poll->answers}},</td>
              
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ url('poll/edit/'.$poll->id) }}">Edit</a>
                    <a href="{{ url ('poll/delete/'.$poll->id) }}" onclick="return window.confirm('delete this poll ?')"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>
@endsection