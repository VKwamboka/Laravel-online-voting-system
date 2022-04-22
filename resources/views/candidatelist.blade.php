@extends('layouts.app')

@section('content')
@include('alert')
<div class="modal fade" id="addnewcandidate">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><b>Add New Canditate</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{ URL::to('storeCandidate') }}" enctype="multipart/form-data">
             @csrf
              <div class="form-group">
                  <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                  </div>
              </div>
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

              <div class="col-md-9">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               </div>
            
              <div class="form-group">
                <label for="regNo" class="col-sm-3 control-label">regNo</label>

                <div class="col-sm-9">
                  <input type="text" class="form-control" id="regNo" name="regNo" required>
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
              <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo</label>

                  <div class="col-sm-9">
                    <input type="file" id="photo" name="photo">
                  </div>
              </div>
              <div class="form-group">
                <label for="Manifesto" class="col-sm-3 control-label">Manifesto</label>

                <div class="col-sm-9">
                  <textarea class="form-control" id="Manifesto" name="Manifesto" rows="7"></textarea>
                </div>
            </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            </form>
          </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <a href="#addnewcandidate" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-bordered">
          <thead>
            <th>RegNumber</th>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Faculty</th>

          </thead>
          <tbody>
        @isset($candidates)
        @forelse ( $candidates as $candidate)
        
        <tr>
          <td>{{ $candidate->regNo }}</td>
          <td>{{ $candidate->firstName }}</td>
          <td>{{ $candidate->secondName }}</td>
          <td>{{ $candidate->email }}</td>
          <td>{{ $candidate->position}}</td>
          <td>{{ $candidate->faculty }}</td>
          <td>
          
           
          </td>
        </tr>
         


        @empty
         
        @endforelse
        @endisset
      </tbody>
    </table> 

    
<!-- Edit -->
@isset($singleCandidate)

@endisset

  @endsection