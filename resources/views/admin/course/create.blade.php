@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('courses.store') }}" class="btn btn-danger mb-5">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Course </h4>
                </div>
                <div class="card-body">
    <form class="forms-sample" method="post" action="{{  route('courses.store')  }}" enctype="multipart/form-data">
    @csrf
                  <div class="row">
              
                    <div class="col-md-8">
                       <div class="form-group">
                         <label class="bmd-label-floating">Course Name</label>
                        <input type="text" name="course_name" class="form-control">
                <font style="color: red">
              {{ ($errors->has('course_name'))?($errors->first('course_name')):'' }}
              </font>
                        </div>
              
                      </div>

                <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Course Description</label>
                          <textarea rows="10" cols="20" class="form-control" name="course_des"></textarea>
                  <font style="color: red">
              {{ ($errors->has('course_des'))?($errors->first('course_des')):'' }}
              </font>
                        </div>
             
                </div>

                <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Course Fee</label>
                          <input type="text" name="course_fee" class="form-control">
                          <font style="color: red">
              {{ ($errors->has('course_fee'))?($errors->first('course_fee')):'' }}
              </font>
                        </div>
              
                </div>

                  <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Total Enroll</label>
                          <input type="text" name="course_totalenroll" class="form-control">
                          <font style="color: red">
              {{ ($errors->has('course_totalenroll'))?($errors->first('course_totalenroll')):'' }}
              </font>
                        </div>
              
                </div>

                  <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Total Class</label>
                          <input type="text" name="course_totalclass" class="form-control">
                            <font style="color: red">
              {{ ($errors->has('course_totalclass'))?($errors->first('course_totalclass')):'' }}
              </font>
                        </div>
            
                </div>


                  <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating">Course Link</label>
                        <input type="text" name="course_link" class="form-control">
                        <font style="color: red">
              {{ ($errors->has('course_link'))?($errors->first('course_link')):'' }}
              </font>
                        </div>
              
                </div>

            <div class="col-md-8">            
               <div class="form-group">
               <label>Upload Image</label>
               <div class="row">
                <div class="col-12">
                 {{-- <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label> --}}
                 <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="course_img">
                          <font style="color: red">
            {{ ($errors->has('course_img'))?($errors->first('course_img')):'' }}
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