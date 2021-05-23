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
              <a href="{{ route('benner.create') }}" class="btn btn-danger mb-5">Add Bennar Info</a>

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Bennar Info List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>SubTitle</th>
                        <th>Another Title</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                      </thead>

                  @foreach ($bennar as $key=>$value)
                   
                   <tbody>
                      
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->benner_title }}</td>
                          <td>{{ $value->benner_sub }}</td>
                          <td>{{ $value->benner_sub_title }}</td>
                          <td>{{ $value->created_at }}</td>
                          <td>{{ $value->updated_at }}</td>
                     <td class="text-right">

            <form  action="{{ route('benner.destroy',$value->id) }}"  method="POST">
                  @csrf
                  <a href="{{ route('benner.edit',$value->id) }}" class="btn btn-info">
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