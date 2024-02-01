<!doctype html>
<html lang="en">

@include('includes.head')
  <body>
    <div class="site-wrap" id="home-section">  
    @include('includes.header')
    @include('includes.headerPage')

    @yield('content')



    @include('includes.footer')
    </div>
    @include('includes.footerJs')
  </body>

</html>

