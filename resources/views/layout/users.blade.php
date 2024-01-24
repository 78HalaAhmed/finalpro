
<!DOCTYPE html>
<html lang="en">
@section('title')
Rent Car Admin | Users List
@endsection
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
                <h3>Manage <small>Users</small></h3>
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
                  <div class="x_title">
                    <h2>List of Users</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Registration Date</th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Active</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                     @foreach($users as $user)

                      <tbody>
                        <tr>
                          <td>{{ $user->created_at }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->username }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                        @if($user->active)
                             Yes 
                        @else
                          No 
                          @endif
                       </td>
                       <td> <a href="edituser/{{ $user->id }}"><img src="{{ asset('assets/images/edit.png')}}" ></a></td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        @include('includes.footer')

  </body>
</html>