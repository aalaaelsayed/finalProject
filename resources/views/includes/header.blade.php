<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="{{ Route ('index') }}"><strong>CarRental</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="{{ Route ('index') }}" class="nav-link  {{ request()->routeIs('index') ? 'active' : '' }}">Home</a></li>
                  <li><a href="{{ Route ('listing') }}" class="nav-link  {{ request()->routeIs('listing') ? 'active' : '' }}">Listing</a></li>
                  <li><a href="{{ Route ('testimonials') }}" class="nav-link   {{ request()->routeIs('testimonials') ? 'active' : '' }}">Testimonials</a></li>
                  <li><a href="{{ Route ('blog') }}" class="nav-link   {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a></li>
                  <li><a href="{{ Route ('about') }}" class="nav-link   {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                  <li><a href="{{ Route ('Contact') }}" class="nav-link   {{ request()->routeIs('Contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>