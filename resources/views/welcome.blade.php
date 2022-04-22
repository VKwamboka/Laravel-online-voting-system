@extends('layouts.app')

@section('content')
<div style="display:flex; align-items:center;justify-content:center ; height:85vh; width:85vw; 
background-image:url('img/15.jpg');background-repeat:no-repeat;background-size:100% 100%" >
<div class="container mt-3" style="opacity:0.9">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display:flex; align-items:center;justify-content:center; font-size:24px"><b>{{ __('WELCOME TO STUDENTS REAL TIME VOTING SYSTEM') }}</b></div>

                <div class="card-body">
                   @if(!Auth::check())
                       
                   <div style="display:flex; align-items:center;justify-content:center">
                       <a href="{{URL::to('/login')}}" class="btn mx-4 btn-info">Login</a>
                       <a href="{{URL::to('/register')}}" class="btn btn-info">register</a>

                   
                   </div>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
