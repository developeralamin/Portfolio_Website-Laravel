@extends('layouts.app')
@section('title','Dashboard')
@section('content')

    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12  ">
                    <div class="card">
                        <div class="card-header card-header-primary">
                       <h4 class="card-title ">{{ $review->subject }}</h4>
                         </div>
                        <div class="card-content pl-5 pt-4">
                           <div class="row">
                               <div class="col-md-12">
                                   <strong>Name:</strong> {{ $review->review_name }}<br>
                              
                                   <strong>Description:</strong> </strong><hr>

                                   <p>{{ $review->review_des }}</p><hr>
  <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/review/'.$review->review_msg) }}"
                            style="height: 300px; width: 300px" alt=""></td>
                               </div>
                           </div>
                            <a href="{{ route('review.index') }}" class="btn btn-danger">Back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

