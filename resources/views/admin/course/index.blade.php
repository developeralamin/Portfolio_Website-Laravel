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
              <a href="{{ route('courses.create') }}" class="btn btn-danger mb-5">Add Courses</a>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Courses List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>C.Name</th>
                        <th>C.Description</th>
                        <th>C.Fee</th>
                        <th>T.Enroll</th>
                        <th>T.Class</th>
                        <th>C.Link</th>
                        <th>C.Img</th>
                        <th>Actions</th>
                      </thead>

                  @foreach ($courses as $key=>$value)
                   
                   <tbody>
                      
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->course_name }}</td>
                          <td>{{ $value->course_des }}</td>
                          <td>{{ $value->course_fee }}</td>
                          <td>{{ $value->course_totalenroll }}</td>
                          <td>{{ $value->course_totalclass }}</td>
                          <td>{{ $value->course_link }}</td>
                         <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/course/'.$value->course_img) }}"
                            style="height: 100px; width: 100px" alt=""></td>
                          {{-- <td>{{ $value->image }}</td> --}}

                     <td class="text-right">

               <form  action="{{ route('courses.destroy',$value->id) }}"  method="POST">
                  @csrf
                  <a href="{{ route('courses.edit',$value->id) }}" class="btn btn-info">
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