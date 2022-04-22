@extends('layouts.app')

@section('content')
@include('alert')
<form class="form-horizontal" method="POST" action="{{ URL::to('ViewPollsResults') }}" enctype="multipart/form-data">
        @csrf
    
    
            <label for="poll" class="col-sm-3 control-label">poll</label>
    
            <div class="col-sm-9">
                <select class="form-control" id="poll" name="poll" required>
                    <option value="" selected>- Select  poll  for results -</option>
    @forelse ($allpolls as $poll )
        
    <option value='{{$poll->id}}'>{{$poll->title}}</option>

    @empty
        

    @endforelse
    
                </select>
            </div>
       
   
           
            <button type="submit" class=" m-3 btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i>
                submit</button>
    </form>


@endsection