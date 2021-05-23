@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('review.store') }}" class="btn btn-danger mb-5">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Add Review </h4>
                </div>
                <div class="card-body">
    <form class="forms-sample" method="post" action="{{  route('review.store')  }}" enctype="multipart/form-data">
    @csrf
                  <div class="row">
              
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Review Name</label>
                          <input type="text" name="review_name" class="form-control">
              <font style="color: red">
              {{ ($errors->has('review_name'))?($errors->first('review_name')):'' }}
              </font> 
                        </div>
              
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Review Description</label>
                          <textarea rows="10" cols="20" class="form-control" name="review_des"></textarea>
                  <font style="color: red">
              {{ ($errors->has('review_des'))?($errors->first('review_des')):'' }}
              </font>
                        </div>
           
                      </div>

            <div class="col-md-8">            
               <div class="form-group">
               <label>Upload Image</label>
               <div class="row">
                <div class="col-12">
                 {{-- <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label> --}}
                 <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="review_msg">
            <font style="color: red">
            {{ ($errors->has('review_msg'))?($errors->first('review_msg')):'' }}
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