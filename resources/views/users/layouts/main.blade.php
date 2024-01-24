<!doctype html>
<html lang="en">

  @include('users.includes.head')

  <body>

    <div class="site-wrap" id="home-section">

      @include('users.includes.navbar')

      @yield('content')

      @section('rentAcar')
      @include('users.includes.rentAcar')
      @show
      
      @include('users.includes.footer')

    </div>

    @include('users.includes.footerJS')

  </body>

</html>