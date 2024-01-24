<!doctype html>
<html lang="en">

  @section('title')
  CarRental
  @endsection
  
  @include('users.includes.head')

  <body>

    <div class="site-wrap" id="home-section">

      @include('users.includes.navbar')

      @include('users.includes.carousel')
  
      @include('users.includes.steps')
      
      @include('users.includes.promo')

      @include('users.includes.carListing')

      @include('users.includes.features')

      @include('users.includes.testimonials')

      @include('users.includes.rentAcar')
      
      @include('users.includes.footer')

    </div>

    @include('users.includes.footerjs')

  </body>

</html>