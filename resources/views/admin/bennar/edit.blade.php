@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('benner.store') }}" class="btn btn-danger mb-5">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Update BennarText </h4>
                </div>
                <div class="card-body">
     <form class="forms-sample" method="post" 
    action="{{ route('benner.update',$bennar->id) }}" enctype="multipart/form-data">
    
                   @csrf
                   @method('PUT') 
                  <div class="row">
              
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="bmd-label-floating">Bennar Title</label>
                        <input type="text" name="benner_title" value="{{ $bennar->benner_title }}" class="form-control">
                        <font style="color: red">
              {{ ($errors->has('benner_title'))?($errors->first('benner_title')):'' }}
              </font>  
                        </div>
             
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bennar Description</label>
                          <textarea rows="10" cols="20" class="form-control" name="benner_sub">{{ $bennar->benner_sub }}</textarea>
                  <font style="color: red">
              {{ ($errors->has('benner_sub'))?($errors->first('benner_sub')):'' }}
            </font>
                        </div>
           
                      </div>

               <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating">Bennar Another Title</label>
                        <input type="text" name="benner_sub_title"  value="{{ $bennar->benner_sub_title }}" class="form-control">
              <font style="color: red">
    {{ ($errors->has('benner_sub_title'))?($errors->first('benner_sub_title')):'' }}
              </font>
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