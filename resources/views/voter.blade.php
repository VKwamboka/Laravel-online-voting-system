
@extends('layouts.app')
@section()
  

    @if ($layout=='index')
    <div class="container-fluid">
      <div class="row">
            <section class="col">
              @include("voterslist")
            </section>

            <section class="col"></section>
           
    </div>
    @elseif ($layout=='create')
    <div class="container-fluid">
      <div class="row">
            <section class="col">
              @include("voterslist")
            </section>

            <section class="col">
              <form action="{{ '/store' }}" method="post"> 
                @csrf

                <div class="form-group">
                  <label> REGNO</label>
                  <input name= "regNo" type="text" class="form-control"  placeholder="Enter Regno">
                </div>
                <div class="form-group">
                  <label> First Name</label>
                  <input name= "firstName" type="text" class="form-control"  placeholder="Enter FirstName">
                </div>
                <div class="form-group">
                  <label> Last Name</label>
                  <input name= "lastName" type="text" class="form-control"  placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                  <label> Email</label>
                  <input name= "email" type="email" class="form-control"  placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label> Faculty</label>
                  <input name= "faculty" type="text" class="form-control"  placeholder="Enter Faculty">
                </div>
                <input type="submit" class="btn btn-info" value="Save">
                <input type="reset" class="btn btn-warning" value="Reset">
              </div> 
              
              </form>
            </section>
  
        
    </div>
    </div>
    @elseif ($layout=='show')
    <div class="container-fluid">
      <div class="row">
            <section class="col">
              
              @include("voterslist")
            </section>

            <section class="col"></section>
    </div>
  </div>
    @elseif ($layout=='edit')
    <div class="container-fluid">
      <div class="row">
            <section class="col">
              @include("voterslist")
            </section>

            <section class="col"></section>
    </div>
  </div>
      
    @endif
    @endsection