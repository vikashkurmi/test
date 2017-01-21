<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Vikas </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->

	<link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/icomoon.css') }}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/themify-icons.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }} ">

	<!-- Modernizr JS -->
	<script src="{{ URL::asset('assets/js/modernizr-2.6.2.min.js') }} "></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	@yield('css_files')

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="javascript::">Splash <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li class="btn-cta"> <a href="javascript::"> <span> Features </span> </a> </li>
						<li class="btn-cta"> <a href="javascript::"> <span> Pricing </span> </a> </li>
						<li class="btn-cta"> <a href="javascript::"> <span> Contact </span> </a> </li>
						<li class="btn-cta"> <a href="register"> <span> Registration </span> </a> </li>
						@if(Session::has('user_data'))
		                    <li class="btn-cta"> <a href="Logout"> <span> Sign Out </span> </a> </li>
		                @else
		                	<li class="btn-cta"> <a href="login"> <span> Please Signin </span> </a> </li>
		                @endif				
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

 <div class="container">
  <!-- Modal -->
@yield('model')
	  <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Add Gallery </h4>
        </div>
        <div class="modal-body">
          <form name="form" method="post" action="ImageData" enctype="multipart/form-data">
	          	{{ csrf_field() }}
	          	<div class="form-group">
			      	<label for="title">Title:</label>			             
			        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
			        <p>  {{ $errors->first('title') }} 	</p>
			    </div>
			    <div class="form-group">
			      	<label for="description">Description:</label>			             
			       	<input type="text" name="description" class="form-control" id="description" placeholder="Enter Description">
			       	<p>  {{ $errors->first('description') }} 	</p>
			    </div>
			    <div class="form-group">
			      	<label for="file">Browse File:</label>			             
			        <input type="file" name="file" class="form-control" style="display: block;">
			        <p>  {{ $errors->first('file') }} 	</p>
			    </div>
			    <div class="modal-footer">
			        <input type="submit" name="submit" value="Upload File" class="btn btn-danger">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			    </div>			    
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@yield('header')

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(assets/images/img_5.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row"> 
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em"> @yield('welcome')
						<div class="col-md-6 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Welcome to Splash</span>
							<h1>Build website using this template.</h1>	
							
						</div>
						
									

						<div class="col-md-6 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							@yield('login')
							@yield('registration')
						</div>	
							<!--<div class="form-wrap">	
														
								 <div class="tab">
									<ul class="tab-menu">
										<li class="active gtco-first"><a href="#" data-tab="signup">Sign up</a></li>
										<li class="gtco-second"><a href="#" data-tab="login">Login</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">

											@if(Session::has('registration'))
												<p class="alert alert-info">{{ Session::get('registration') }}</p>
											@endif

											<!-- @if(count($errors) > 0)
												<div class="alert alert-danger">
												    <ul>
												        @foreach ($errors->all() as $error)
												            <li>{{ $error }}</li>
												        @endforeach
												    </ul>
												</div>
											@endif -->
											
											<!--  <form name="login_form" action="RegistrationData" method="post" enctype="multipart/form-data">
											{{ csrf_field() }}
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">Username or Email</label>
														<input type="email" name="user_email"  class="form-control" id="username">
														@if($errors->has('user_email'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('user_email') }}</strong>
						                                    </span>
						                                @endif
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="user_password">Password</label>
														<input type="password" name="user_password" class="form-control" id="user_password">											@if($errors->has('user_password'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('user_password') }}</strong>
						                                    </span>
						                                @endif
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="password2">Repeat Password</label>
														<input type="password" name="password2" class="form-control" id="password2">
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Sign up">
													</div>
												</div>
											</form>	
										</div>

										<div class="tab-content-inner" data-content="login">
											@if(Session::has('login'))
												<p class="alert alert-info">{{ Session::get('login') }}</p>
											@endif -->

											<!-- @if(count($errors) > 0)
												<div class="alert alert-danger">
												    <ul>
												        @foreach ($errors->all() as $error)
												            <li>{{ $error }}</li>
												        @endforeach
												    </ul>
												</div>
											@endif -->
											<!-- <form name="singup_form" action="UserLogin" method="post" enctype="multipart/form-data"> {{ csrf_field() }}
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">Username or Email</label>
														<input type="email" name="user_email" class="form-control" id="username">
														@if($errors->has('user_email'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('user_email') }}</strong>
						                                    </span>
						                                @endif
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="user_password">Password</label>
														<input type="password" name="user_password" class="form-control" id="user_password">
														@if($errors->has('user_password'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('user_password') }}</strong>
						                                    </span>
						                                @endif
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary" value="Login">
													</div>
												</div>
											</form>	
										</div>  -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


@yield('content')
	<div class="gtco-section border-bottom" >		
		<!-- <button type="button" class="btn btn-danger" data-target="#myModal"> Add Gallery </button> -->
		
		<div class="gtco-container">
		 
			<!-- <div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Beautiful Images</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{ URL::asset('assets/images/img_2.jpg') }}" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{ asset('assets/images/img_2.jpg') }}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>			
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{ URL::asset('assets/images/img_3.jpg') }}" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="http://localhost/blog1/resources/assets/images/img_3.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{ URL::asset('assets/images/img_4.jpg') }}" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="http://localhost/blog1/resources/assets/images/img_4.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{ URL::asset('assets/images/img_1.jpg') }}" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{ URL::asset('assets/images/img_1.jpg') }}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{ URL::asset('assets/images/img_5.jpg') }}" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{ URL::asset('assets/images/img_5.jpg') }}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="{{ URL::asset('assets/images/img_6.jpg') }}" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{ URL::asset('assets/images/img_6.jpg') }}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div> -->
				@yield('gallery')	

			</div>
		</div>
	</div>


@yield('features')
	<div id="gtco-features" class="border-bottom">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Splash Features</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-vector"></i>
						</span>
						<h3>Pixel Perfect</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-tablet"></i>
						</span>
						<h3>Fully Responsive</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<h3>Web Development</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-ruler-pencil"></i>
						</span>
						<h3>Web Design</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-paint-roller"></i>
						</span>
						<h3>Accent Colours</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-announcement"></i>
						</span>
						<h3>Theme Updates</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-stats-up"></i>
						</span>
						<h3>Increase Earnings</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-magnet"></i>
						</span>
						<h3>Passive Income</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Fun Facts</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Creativity Fuel</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Happy Clients</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-briefcase"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Projects Done</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-time"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Hours Spent</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	<div id="gtco-products">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>More Products</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="owl-carousel owl-carousel-carousel">
					<div class="item">
						<a href="#"><img src="{{ URL::asset('assets/images/img_1.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ URL::asset('assets/images/img_2.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ URL::asset('assets/images/img_3.jpg') }} " alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{ URL::asset('assets/images/img_4.jpg') }}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscribe</h2>
					<p>Be the first to know about the new templates.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


@yield('footer')
	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About <span class="footer-logo">Splash<span>.<span></span></h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>Links</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Knowledge Base</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Terms of services</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +91 78234 56890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@myweb.co.in</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat </a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="#" target="_blank">FreeHTML5.co</a> Demo Images: <a href="#" target="_blank">Unsplash</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ URL::asset('assets/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ URL::asset('assets/js/jquery.waypoints.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ URL::asset('assets/js/jquery.countTo.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/magnific-popup-options.js') }}"></script>
	<!-- Main -->
	<script src="{{ URL::asset('assets/js/main.js') }}"></script>

	@yield('script_file')

	</body>
</html>

