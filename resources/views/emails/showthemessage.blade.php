<!DOCTYPE html>
<html lang="en">
@include('includes.head')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      @include('includes.sidemenu')
		  @include('includes.nav')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Messages</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <h2>Full Name: {{$user->firstname .' '.$user->lastname}}</h2>
                  <br>
                  <h2>Email: {{$user->email}} </h2>
                   <br>
                  <h2>Message Content:</h2>
                  <p>{{$user->message}} </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       
		  @include('includes.footer')

  </body>
</html>
