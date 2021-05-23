@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('project.store') }}" class="btn btn-danger mb-5">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Project </h4>
                </div>
                <div class="card-body">
    <form class="forms-sample" method="post" action="{{  route('project.store')  }}" enctype="multipart/form-data">
    @csrf
                  <div class="row">
              
                    <div class="col-md-8">
                       <div class="form-group">
                         <label class="bmd-label-floating">Project Name</label>
                        <input type="text" name="project_name" class="form-control">
                <font style="color: red">
              {{ ($errors->has('project_name'))?($errors->first('project_name')):'' }}
              </font>
                        </div>
              
                      </div>

                <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Project Description</label>
                          <textarea rows="10" cols="20" class="form-control" name="project_des"></textarea>
                  <font style="color: red">
              {{ ($errors->has('project_des'))?($errors->first('project_des')):'' }}
              </font>
                        </div>
             
                </div>


                  <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating">Project Link</label>
                        <input type="text" name="project_link" class="form-control">
                        <font style="color: red">
              {{ ($errors->has('project_link'))?($errors->first('project_link')):'' }}
              </font>
                        </div>
              
                </div>

            <div class="col-md-8">            
               <div class="form-group">
               <label>Project Image</label>
               <div class="row">
                <div class="col-12">
                 {{-- <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label> --}}
                 <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="project_img">
                          <font style="color: red">
            {{ ($errors->has('project_img'))?($errors->first('project_img')):'' }}
           </font>             
                </div>
                   
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