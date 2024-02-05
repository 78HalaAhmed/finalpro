<!DOCTYPE html>
<html lang="en">
@section('title')
Rent Car Admin | edit Car
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
							<h3>Manage Cars</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
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
									<h2>Edit Car</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form action="{{route('updatecar',$car->id)}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                       @csrf
									   @method('PUT')
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="title" required="required" class="form-control " name="title" value="{{$car->title}}">
											</div>
										</div>
										@error('title')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror
											   
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="content" required="required" class="form-control"  >{{$car->content}}</textarea>
											</div>
										</div>
										@error('content')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror
										<div class="item form-group">
											<label for="luggage" class="col-form-label col-md-3 col-sm-3 label-align">Luggage <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="luggage" class="form-control" type="number" name="luggage" required="required" value="{{$car->luggage}}">
											</div>
										</div>
										@error('luggage')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror
										<div class="item form-group">
											<label for="doors" class="col-form-label col-md-3 col-sm-3 label-align">Doors <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="doors" class="form-control" type="number" name="doors" required="required" value="{{$car->doors}}">
											</div>
										</div>
										@error('doors')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror
										<div class="item form-group">
											<label for="passengers" class="col-form-label col-md-3 col-sm-3 label-align">Passengers <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="passengers" class="form-control" type="number" name="passengers" required="required" value="{{$car->passengers}}">
											</div>
										</div>
										@error('passengers')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror
										<div class="item form-group">
											<label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="price" class="form-control" type="number" name="price" required="required"value="{{$car->price}}">
											</div>
										</div>
										@error('price')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" class="flat" name="active" @checked($car->active)>
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="file" id="image" name="image"  class="form-control">
												<img src="{{ asset('userassets/images/'.$car->image) }}" style="width: 200px;">
											</div>
										</div>
										@error('image')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="category_id" id="">
												<option value=" ">Select Category</option>
												@foreach( $categories as $category )
													
													<option value="{{ $category->id }}" @selected( $category->id == $car->category_id)>{{$category->categoryname}} </option>
													@endforeach
												</select>
											</div>
										</div>
										@error('category_id')
										<div class='alert alert-danger' style="width: 48%; margin-left: 270px;">{{ $message }}</div>
                                        @enderror
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
											<a href="{{ route('CarsList')}}" button class="btn btn-primary" type="button">Cancel</button></a>
												<button type="submit" class="btn btn-success">Update</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			
		  @include('includes.footer')

</body></html>
