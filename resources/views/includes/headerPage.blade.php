     
      <div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>@yield('t')</strong></h1>
                <div class="custom-breadcrumbs"><a href="{{ Route ('index') }}">Home</a> <span class="mx-2">/</span> <strong>@yield('t')</strong></div>
              </div>
              @yield('y')
            </div>
          </div>
        </div>
      </div>