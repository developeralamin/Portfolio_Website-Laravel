 <!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Alamin Islam| Expert Web Developer in Bangladesh</title>
    <meta name="google-site-verification" content="J2K-awrLm--LtTSkUGmFsRpFFTU0W1V5PqZTQp0b6pg" />
    <meta name="description" content="Rabbil Hasan is an Expert Web Developer in Bangladesh. Expert Mobile App Developer in Bangladesh.He is highly talented, experienced, professional and cooperative software engineer, working in programming and web world for more than 4 years. Moreover Rabbil Hasan has a skilled team for achieving his goal named “Team Rabbil”.Team Rabbil assure you a wide range of quality IT services. ">
    <meta name="keywords" content="Expert Web Developer in Bangladesh, Expert Mobile App Developer in Bangladesh, Android App Developer in Bangladesh">
    <meta name="author" content="Rabbil Hasan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('frontend/images/playbtn.svg') }}" type="favicon/ico" />
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('frontend/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
</head>
<body>

@extends('component.menu')

<div class="container-fluid jumbotron mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="{{ asset('frontend/images/code.svg') }}">
            <h1 class="page-top-title mt-3">- প্রজেক্টস সমূহ -</h1>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">

   @foreach($project as $project)
        <div class="col-md-3 p-1 text-center">
            <div class=" m-1 card">
                <div class="text-center">
                     <img src="{{ asset('uploads/project/'.$project->project_img) }}" alt="Avatar" class="thumbnail-image ">
                    <h5 class="service-card-title mt-4">{{ $project->project_name }} </h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{ $project->project_des }} </h6>
                    <a target="__blank" href="{{ $project->project_link }}" class="normal-btn mt-2 mb-4 btn">বিস্তারিত</a>
                </div>
            </div>
        </div>
   @endforeach
    </div>
</div>
@extends('component.footer')



<script type="text/javascript" src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/axios.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>


</body>
</html>