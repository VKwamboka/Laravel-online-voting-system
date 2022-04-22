@extends('layouts.app')

@section('content')
@include('alert')
  <form action="{{URL::to('voteTally/store/9')}}" enctype="multipart/form-data" method="post">
      @csrf

      <div class="row m-3 ">
        <div class="col-md-2">
           <div style="display:flex;width:200px;height:300px; justify-content:center;align-items:center">
              @if (Auth::check())
                  <button type="submit" class="btn btn-success">Vote</button>
              @else
                  <h3>Loin to Vote!!</h3>
              @endif
           </div>
        </div>
        <div class="col-md-10">

            <div class="row">

    <div class="col-md-12">
        <select class="form-control my-3" id="" name="election_id" required style="width:62vw">
        <option value="" selected>- Select Election -</option>
    
        @foreach ($allelections as $election )
        <option value="{{$election->id}}">{{$election->electionname}}</option>
        @endforeach
    </select></div>
                @forelse ($Allpositions as $position)
                  
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-11">
                            {{--  --}}
                            <div class="card card-primary collapsed-card  shadow">
                                <div class="card-header">
                                    <h3 class="card-title">{{$position->positionName}}</h3>
                        
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <input type="hidden" name = "voterId" value ="77">
                                {{-- <input type="hidden" name="election_id" value="1"> --}}
                               
                                <div class="card-body">
                                 <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed ">
                                            <thead>
                                                <tr>
                                                    <th>Vote</th>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                    <th style="display:flex;justify-content:center;align-items:center;width:300px;">manifesto</th>
                                                    
                                                    {{-- <th>Reason</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                    @foreach ($allcandidates as $candidate)
            
                                    @if ($candidate->position === $position->positionName)
                            
                                        <tr>
                                            <td>
                                                <input type="hidden" name="candidate_id" value="{{$candidate->id}}">
                                            <input type="radio" name="{{$candidate->position}}" class="form-control" required value="{{$candidate->id}}">
 
                                            </td>
                                            <td>
                                           {{$candidate->firstName}}
                                            {{$candidate->secondName}}
                                            </td>
                                            <td>
                                                {{-- {{ $candidate->id}} --}}
                                                <div >
                                                   <img src="{{asset('storage/candidateImg/'.$candidate->photo)}}" alt="" width="100" height="100" srcset="">
                                                </div>
            
                                            </td>
                                            <td style="display:flex;justify-content:center;align-items:center; width:300px;height:100px">
                                                    {{$candidate->Manifesto}}
                                                    
                                                    
                                            </td>
            
                                        </tr>
                                        @endif
                                        @endforeach
                                   
                                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
  </form>



@endsection