@extends('layouts.app')

@section('content')
@include('alert')
    <div class="content poll-vote">
        @forelse ($allpolls as $poll )
            
        <h2>
           {{$poll->title}}
        </h2>
        <p>
           {{$poll->description}}
        </p>
        <form action="{{URL::to('pollVoting/'.$poll->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @forelse ($poll_answers as $answer)

        @if($poll->id === $answer->poll_id)
            
        <label>
            <input type="radio" name="poll_answer" value="{{$answer->id}}">
           {{$answer->title}}
        </label>
       
    
        @endif
                
            @empty
                
            @endforelse
            <div>
                @if (Auth::check())
               <div style="display:flex; align-items:center;">
                   <input type="submit" value="Vote">
                   
               </div>
            @else
                <h3>Login to vote!!!!</h3>
            @endif
                </div>
        </form>
 <form class="form-horizontal" method="POST" action="{{ URL::to('ViewPollsResults') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="poll" value="{{$poll->id}}" />
    <input type="submit" value="View Result" class="btn  btn-info" style="background-color:blue;" />
</form>
        @empty
            
        @endforelse
</div>

@endsection