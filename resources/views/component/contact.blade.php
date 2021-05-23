<div id="contact" class="container-fluid section-marginTop parallax text-center">
    <div class="row ">
        <div class="col-md-6 contact-form ">
            <h5 class="help-line-title"> <i class="fas icon-custom-color fa-headphones-alt"></i> হেলপ লাইন </h5>
            <h5 class="help-line-title m-0">  01738022592 </h5>
        </div>
        <div class="col-md-4 contact-form">
                <h5 class="service-card-title">যোগাযোগ করুন </h5>

    <form class="contact-form" method="post" action="{{ route('blog.index') }}">
                            @csrf

                <div class="form-group ">
                    <input type="text" name="contact_name" class="form-control w-100" placeholder="আপনার নাম">
         <font style="color: red">
              {{ ($errors->has('contact_name'))?($errors->first('contact_name')):'' }}
         </font>  
                </div>
                <div class="form-group">
                    <input type="text" name="contact_phone" class="form-control  w-100" placeholder="মোবাইল নং ">
            <font style="color: red">
              {{ ($errors->has('contact_phone'))?($errors->first('contact_phone')):'' }}
         </font> 
                </div>
                <div class="form-group">
                    <input type="email" name="contact_email" class="form-control  w-100" placeholder="ইমেইল ">
        <font style="color: red">
              {{ ($errors->has('contact_email'))?($errors->first('contact_email')):'' }}
         </font>
                </div>
                <div class="form-group">
                    <input type="text" name="contact_msg" class="form-control  w-100" placeholder="মেসেজ ">
                     <font style="color: red">
              {{ ($errors->has('contact_msg'))?($errors->first('contact_msg')):'' }}
         </font>
                </div>
                <button type="submit" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>

              </form>    

        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>