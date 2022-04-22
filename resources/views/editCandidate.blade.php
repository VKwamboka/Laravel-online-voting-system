@extends('layouts.app')

@section('content')
@include('alert')
<div class="">
    <form class="form-horizontal" method="POST" action="{{ URL::to('candidate/update/'.$singleCandidate->id) }}" enctype="multipart/form-data">
      @csrf
       <div class="form-group">
           <label for="firstname" class="col-sm-3 control-label">Firstname</label>

           <div class="col-sm-9">
             <input type="text" class="form-control" id="firstname" value="{{ $singleCandidate->firstName }}" name="firstname" required>
           </div>
       </div>
       <div class="form-group">
           <label for="lastname" class="col-sm-3 control-label">Lastname</label>

           <div class="col-sm-9">
             <input type="text" value="{{ $singleCandidate->secondName }}" class="form-control" id="lastname" name="lastname" required>
           </div>
       </div>
       <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

       <div class="col-md-9">
             <input id="email" type="email" 
             class="form-control @error('email') is-invalid @enderror" name="email"
              value="{{ $singleCandidate->email}}" required autocomplete="email" autofocus>

             @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
        </div>
     
       <div class="form-group">
         <label for="regNo" class="col-sm-3 control-label">regNo</label>

         <div class="col-sm-9">
           <input type="text" class="form-control" id="regNo" name="regNo" value="{{ $singleCandidate->regNo}}"  required>
         </div>
     </div>
     <div class="form-group">
       <label for="Faculty" class="col-sm-3 control-label">Faculty</label>

       <div class="col-sm-9">
         <select class="form-control" id="faculty" name="faculty" required>
           <option value="" selected>- Select  -</option>
           
            <option value='fset'>fset</option>
            <option value='nursing'>nursing</option>
            <option value='fed'>fed</option>
            <option value='fbs'>fbs</option>

          </select>
       </div>
   </div>
       <div class="form-group">
           <label for="position" class="col-sm-3 control-label">Position</label>

           <div class="col-sm-9">
           <select class="form-control" id="position" name="position" required>
              <option value="" selected>- Select -</option>
            
              @foreach ($allPositions as $position )
              <option value="{{$position->positionName}}">{{$position->positionName}}</option>
              @endforeach
            </select>
           </div>
       </div>
       <div class="mx-2" >
           <img src="{{ asset('candidateImg/'.$singleCandidate->photo) }}" alt="" width="100" height="100" srcset="">
       </div>
       <div class="form-group">
           <label for="photo" class="col-sm-3 control-label">Photo</label>

           <div class="col-sm-9">
             <input type="file" id="photo" name="photo">
           </div>
       </div>
       <div class="form-group">
         <label for="Manifesto" class="col-sm-3 control-label">Manifesto</label>

         <div class="col-sm-9">
           <textarea class="form-control" id="Manifesto" name="Manifesto" rows="7">
               {{ $singleCandidate->Manifesto }}
           </textarea>
         </div>
     </div>
       
   </div>       
  
    {{-- <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button> --}}
    <button type="submit" class=" ml-2 btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
    </form>
  
@endsection