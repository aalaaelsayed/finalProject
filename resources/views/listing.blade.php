@extends('layouts.pages')

@section('content')
  



@include('includes.listOfcars')

        
            
      
          
    <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              {{ $Carlists->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">

    @include('includes.testimonialsinside')

    </div>
    @include('includes.waiting')    

    @endsection
      
 

      @section('title')
      listing
      @endsection
      @section('t')
      listing
    @endsection