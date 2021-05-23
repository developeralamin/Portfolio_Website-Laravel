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
              <a href="{{ route('service.create') }}" class="btn btn-danger mb-5">Add Service</a>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Service List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                      </thead>

                  @foreach ($service as $key=>$value)
                   
                   <tbody>
                      
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->service_name }}</td>
                          <td>{{ $value->service_des }}</td>
                         <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/service/'.$value->service_img) }}"
                            style="height: 100px; width: 100px" alt=""></td>
                          {{-- <td>{{ $value->image }}</td> --}}
                          <td>{{ $value->created_at }}</td>
                          <td>{{ $value->updated_at }}</td>
                     <td class="text-right">

               <form  action="{{ route('service.destroy',$value->id) }}"  method="POST">
                  @csrf
                  <a href="{{ route('service.edit',$value->id) }}" class="btn btn-info">
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