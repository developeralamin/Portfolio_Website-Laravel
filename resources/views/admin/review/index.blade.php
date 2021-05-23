@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="content">
        <div class="container-fluid">

           @if(session('message'))
             <div class="alert alert-success" role="alert">
              {{ session('message') }}
            </div>
         @endif

          <div class="row">
            <div class="col-md-12">
              <a href="{{ route('review.create') }}" class="btn btn-danger mb-5">Add Review</a>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Review List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th> Name</th>
                        <th>Review Image</th>
                        <th class="text-center">Actions</th>
                      </thead>

                  @foreach ($review as $key=>$value)
                   
                   <tbody>
                      
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->review_name }}</td>
                          {{-- <td>{{ $value->review_des }}</td> --}}
                         <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/review/'.$value->review_msg) }}"
                            style="height: 100px; width: 100px" alt=""></td>
                          {{-- <td>{{ $value->image }}</td> --}}

                     <td class="text-right">

               <form  action="{{ route('review.destroy',$value->id) }}"  method="POST">
                  @csrf
                  <a href="{{ route('review.show',$value->id) }}" class="btn btn-success">
                         <i class="fa fa-eye">Show</i>
                    </a>

                  <a href="{{ route('review.edit',$value->id) }}" class="btn btn-info">
                         <i class="fa fa-edit">Edit</i>
                    </a>   
                @method('DELETE')              
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>                
                      </form>                                    
                  </td>
                        </tr>
                      </tbody>
                        @endforeach()
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>




@endsection