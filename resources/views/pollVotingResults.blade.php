@extends('layouts.app')

@section('content')
@include('alert')
<div class="content poll-result">
    

    <h2>
        {{$allpolls->title}}
    </h2>
    <p>
        {{$allpolls->description}}
    </p>
   <div class="wrapper">
         @forelse ($poll_answers as $answer)

        @if($allpolls->id === $answer->poll_id)
        <div class="poll-question">
        <p>
            {{$answer->title}}::<span>
                ({{$answer->votes}}) Votes
            </span>
        </p>
        <div class="result-bar" style="width:{{@round(($answer['votes']/$total_votes)*100)}}%">
           {{ @round(($answer->votes/$total_votes)*100)}}%
        </div>
    </div>
        @endif

        @empty

        @endforelse
        </div>
        
</div>

@endsection