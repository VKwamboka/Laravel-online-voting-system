@extends('layouts.app')

@section('content')
@include('alert')
<form class="form-horizontal" method="POST" action="{{ URL::to('updatepoll/'.$votesmain->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Title" class="col-sm-3 control-label">Title</label>
    
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{$votesmain->title}}" name="title" id="title" placeholder="Title" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Description" class="col-sm-3 control-label">Description</label>
    
            <div class="col-sm-9">
                <input type="text" value="{{$votesmain->description}}" class="form-control" name="description" id="description" placeholder="Description">
            </div>
        </div>
    
        <div class="form-group">
            <label for="answers" class="col-sm-3 control-label">answers(per)line</label>
            <div class="col-sm-9">
                <textarea name="answers" class="form-control" id="answers" placeholder="answers" height="300px" required>
                       @foreach ($votesAnswer as $votes)
                        {{$votes->title}}
                        @endforeach
                                </textarea>
            </div>
        </div>
    

        
            
            <button type="submit" class="mx-3 btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i>
                Update</button>
    </form>


@endsection