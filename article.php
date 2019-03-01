<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Cultivo Website 2019</title>
	<meta name="description" content="Providing developers and marketing a reliable, easy-to-use cloud computing platform of virtual servers (Droplets), object storage (Spaces), and more.
	">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="og:url" content="">
	<meta property="og:title" content="Cultivo - Marketing Website">
	<meta property="og:description" content="Providing developers and marketing a reliable, easy-to-use cloud computing platform of virtual servers (Droplets), object storage (Spaces), and more.
	">
	<meta property="og:site_name" content="Cultivo">
	<meta property="og:image" content="">
	<meta property="og:type" content="website">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@cultivo">
	<meta name="twitter:creator" content="@cultivo">
	<!-- CSS LIBRARIES -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/all.min.js">
</head>
<body>

	<!-- START: NAVBAR SECTION -->
	<nav class="navbar navbar-expand-lg navbar-light navbar-content rel-navbar">
	  <div class="wrapper-content">
	  	<a class="navbar-brand" href="index.php">
		  	<img src="assets/images/logos/dark_logo.png" class="img-fluid logo-image" alt="Main Logo">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <!-- <span class="navbar-toggler-icon"></span> -->
		    <div class="hamburger" id="hamburger-nav">
	          <span class="line"></span>
	          <span class="line"></span>
	          <span class="line"></span>
	        </div>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="work.php">Work</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="about.php">About</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="blog.php">Blog</a>
		      </li>
		    </ul>
		    <div class="button-nav mr-button my-2 my-lg-0">
		      <a href="#" class="btn btn-primary my-2 my-sm-0">Work with us</a>
		    </div>
		  </div>
	  </div>
	</nav>
	<!-- END: NAVBAR SECTION -->
		<input type="hidden" name="blog_id" id="blog_id" value="<?php echo $_GET['id'];?>">
	<!-- START: ARTICLE CONTENT -->
	<div class="article-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-bd">
<!-- 						<h2>The power of the disconnect - Why seperation is the key to success</h2>
 -->					</div>
				</div>
			</div>
		</div>

		<div class="full-image">
			<img src="" alt="" id="blog_image" class="img-fluid">
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="side-area">
						<div class="head-side">
							<small class="sm-title">Sometime Around</small>
							<h2 class="md-title" id="date"></h2>
						</div>
					</div>
				</div>

				<div class="col-md-8">
					<div class="info-content">
						<h4 id="context"></h4>

						<p id="text"></p>


						
					</div>
				</div>
			</div>
		</div>

	
	</div>
	<!-- END: ARTICLE CONTENT -->


	<!-- START: BLOG CONTENT SECTION -->
	<div class="blog-section blog-light">
		<div class="container">
			<div class="row">
				<div class="col-md-12 blog-info" >
					<!-- <div class="blog-inline-content">
						<div class="col-md-8">
							<div class="left-content">
								<small class="sm-title">Considerations of Context</small>
								<h2 class="lg-title">Capitalize on low hanging fruit to identify a ballpark case.</h2>

								<h5 class="cal">October 30</h5>
							</div>
						</div>
						<div class="col-md-4">
							<div class="right-image">
								<img src="assets/images/projects/img-01.jpg" alt="Blog 01" class="img-fluid blog-image">
							</div>
						</div>
					</div>
					<div class="blog-inline-content">
						<div class="col-md-8">
							<div class="left-content">
								<small class="sm-title">Considerations of Context</small>
								<h2 class="lg-title">I realy think this could go viral it needs to be the same.</h2>

								<h5 class="cal">October 30</h5>
							</div>
						</div>
						<div class="col-md-4">
							<div class="right-image">
								<img src="assets/images/projects/img-02.jpg" alt="Blog 01" class="img-fluid blog-image">
							</div>
						</div>
					</div> -->

					
				</div>
			</div>
		</div>
	</div>
	<!-- END: BLOG CONTENT SECTION -->

	<!-- START: DARK CONTENT SECTION -->
	<div class="dark-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="inline-dark">
						<h2>Ready to change the world?</h2>
						<button class="btn btn-default btn-light">Let's Rock and Roll</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: DARK CONTENT SECTION -->


	<!-- START: FOOTER SECTION -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="ft-info">
						<img src="assets/images/ft-logo.png" alt="" class="img-fluid">

						<h4>Built in Boston, designed in Los Angeles, delivered in Denver</h4>

						<div class="copyright">
							<p><span class="italic">Terms and Conditions</span> - Copyright Cultivo Media 2018</p>
						</div>
					</div>
				</div>

				<div class="col-md-2">
					<h4 class="ft-head">Us Stuff</h4>
					<ul class="ft-items">
						<li class="ft-link"><a href="#">Our Works</a></li>
						<li class="ft-link"><a href="#">About Us</a></li>
						<li class="ft-link"><a href="#">Blog</a></li>
					</ul>
				</div>

				<div class="col-md-2">
					<h4 class="ft-head">You Stuff</h4>
					<ul class="ft-items">
						<li class="ft-link"><a href="#">Work with us</a></li>
						<li class="ft-link"><a href="#">General inquiries</a></li>
					</ul>
				</div>

				<div class="col-md-2">
					<h4 class="ft-head">Social Stuff</h4>
					<ul class="ft-items">
						<li class="ft-link"><a href="#">Instagram</a></li>
						<li class="ft-link"><a href="#">Twitter</a></li>
						<li class="ft-link"><a href="#">Linkedin</a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- END: FOOTER SECTION -->



	


	<!-- JAVASCRIPT LIBRARIES -->
	<script src="assets/js/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/js/common.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/swiper.min.js"></script>
	<script src="assets/js/all.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/jquery-3.3.1.js">  </script>
  	<script src="assets/js/article.js"></script>
</body>
</html>