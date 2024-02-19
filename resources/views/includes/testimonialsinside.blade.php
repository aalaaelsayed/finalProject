
<div class="container">
      <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
          </div>
        </div>
        
        <div class="row">
        @foreach($testimonials as $test)
        <div class="col-lg-4 mb-4">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>{{$limitedTestimonialsContent[$loop->index]}}</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="{{asset('assets/images/'. $test->image )}}" alt="Image" class="img-fluid mr-3">

                <div class="author-name">
                  <span class="d-block">{{$test->clientName	 }}</span>
                  <span >{{$test->profession	 }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
   


