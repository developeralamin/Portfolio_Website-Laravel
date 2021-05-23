@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="container">
	<div class="row">

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{ $totalReview }}</h3>
					<h3 class="count-card-text">Total Review</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{ $totalService }}</h3>
					<h3 class="count-card-text">Total Service</h3>
				</div>
			</div>
		</div>

				<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{ $totalCourses }}</h3>
					<h3 class="count-card-text">Total Courses</h3>
				</div>
			</div>
		</div>

	  <div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{ $totalProject }}</h3>
					<h3 class="count-card-text">Total Project</h3>
				</div>
			</div>
		</div>

	  <div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{ $totalContact }}</h3>
					<h3 class="count-card-text">Total Contact</h3>
				</div>
			</div>
		</div>




@endsection