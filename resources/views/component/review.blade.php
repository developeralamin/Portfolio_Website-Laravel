<div class="container section-marginTop text-center">
    <div class="row d-flex justify-content-center">
            <div class="col-md-6 text-center">
                @foreach($review as $review)
                <div id="two" class="owl-carousel mb-4 owl-theme">
                <div class="item m-1 text-center ">
                        <img class="review-img text-center" src="{{ asset('uploads/review/'.$review->review_msg) }}" alt="Card image cap">
                        <h5 class="service-card-title mt-3">{{ $review->review_name }}</h5>
                        <h6 class="service-card-subTitle p-0 m-0">{{ $review->review_des }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>