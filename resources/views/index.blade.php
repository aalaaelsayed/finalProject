<!doctype html>
<html lang="en">
@section('title')
	
CarRental	
  @endsection
@include('includes.head')
  <body>
    <div class="site-wrap" id="home-section">  
    @include('includes.header')
    @include('includes.formScreach')
    @include('includes.howItWork')
    @include('includes.meetThem')
    @include('includes.listOfcars')
    @include('includes.Features')
    @include('includes.Testimonials')
    @include('includes.waiting')    
    @include('includes.footer')
    </div>
    @include('includes.footerJs')

  </body>

</html>

