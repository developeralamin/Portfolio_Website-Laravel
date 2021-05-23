@foreach($bennar as $bennar)

<div class="container-fluid jumbotron mt-5 ">
    <div class="row">
        <div class="col-md-6 justify-content-center">
            <div class="m-lg-5 m-md-5 p-lg-5 m-sm-3 p-sm-3 p-md-5">
                <h1 class="top-banner-title text-justify">{{ $bennar->benner_title }}</h1>
                <h1 class="top-banner-subtitle text-justify">{{ $bennar->benner_sub }}</h1>
                <h1 class="top-banner-subtitle2 text-justify">{{ $bennar->benner_sub_title }}</h1>
                 <a target="_blank" href="https://www.youtube.com/channel/UCSMFY8_rooijS-Zv43tKCrQ"><img class="" src="{{ asset('frontend/images/playbtn.svg') }}"></a>
            </div>
        </div>
        <div class="col-md-6">
          <img  class="top-banner-img  animated fadeIn" src="{{ asset('frontend/images/bannerImg.png') }}"> 
        </div>
    </div>
</div>

@endforeach
