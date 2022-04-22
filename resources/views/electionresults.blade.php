@extends('layouts.app')

@section('content')

@include('alert')
    <div class="row m-3 " style="diplay:flex;justify-content:center;align-items:center;">
    
        <div class="col-md-10">

            <div class="row">

             
                @forelse ($Allpositions as $position)

                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-11">
                            {{-- --}}
                            <div class="card card-primary collapsed-card  shadow">
                                <div class="card-header">
                                    <h3 class="card-title">{{$position->positionName}}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <input type="hidden" name="voterId" value="69">
                                {{-- <input type="hidden" name="election_id" value="1"> --}}

                                <div class="card-body">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed ">
                                            <thead>
                                                <tr>
                                                    <th>results</th>
                                                    <th>Name</th>
                                                    <th>Image</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allvotes as $results)

                                                @if ($results->position === $position->positionName)
                                                @foreach ($allcandidates as $candidate)
                                      @if (($results->position === $position->positionName) && ($candidate->id === $results->candidate_id))  
                                                  
                                                <tr>
                                                    <td>
                                                        <span><b>Votes::{{$results->votes}}</b></span>

                                                    </td>
                                                    <td>
                                                        {{$candidate->firstName}}
                                                        {{$candidate->secondName}}
                                                    </td>
                                                    <td>
                                                        {{-- {{ $candidate->id}} --}}
                                                        <div>
                                                            <img src="{{asset('storage/candidateImg/'.$candidate->photo)}}" alt="" width="100" height="100" srcset="">
                                                        </div>

                                                    </td>
                                            
                                                </tr>
                                                @endif
                                                @endforeach
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




@endsection