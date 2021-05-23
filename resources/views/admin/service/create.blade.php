@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('service.store') }}" class="btn btn-danger mb-5">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Service </h4>
                </div>
                <div class="card-body">
    <form class="forms-sample" method="post" action="{{  route('service.store')  }}" enctype="multipart/form-data">
    @csrf
                  <div class="row">
              
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Service Title</label>
                          <input type="text" name="service_name" class="form-control">
                        </div>
             <font style="color: red">
              {{ ($errors->has('service_name'))?($errors->first('service_name')):'' }}
              </font>  
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Service Description</label>
                          <textarea rows="10" cols="20" class="form-control" name="service_des"></textarea>
                 
                        </div>
            <font style="color: red">
              {{ ($errors->has('service_des'))?($errors->first('service_des')):'' }}
              </font>
                      </div>

            <div class="col-md-8">            
               <div class="form-group">
               <label>Upload Image</label>
               <div class="row">
                <div class="col-12">
                 {{-- <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label> --}}
                 <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="service_img">
                                      
                </div>
                    <font style="color: red">
            {{ ($errors->has('service_img'))?($errors->first('service_img')):'' }}
           </font>
               </div>
               </div>
              </div>

             </div>

            <button type="submit" class="btn btn-primary pull-left">Submit</button>
                   
        </form>

                </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

@endsection