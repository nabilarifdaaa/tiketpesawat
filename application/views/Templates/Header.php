<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Tiket Pesawat</title>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Govihar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<link href="<?php echo base_url('/assets/css/bootstrap.css'); ?>" type="text/css" rel="stylesheet" media="all">
<link href="<?php echo base_url('/assets/css/style.css'); ?>" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="<?php echo base_url('/assets/css/flexslider.css'); ?>" type="text/css" media="screen" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url('/assets/css/JFFormStyle-1.css'); ?>" />
<!-- js -->
<script src="<?php echo base_url('/assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/js/modernizr.custom.js'); ?>"></script>
<!-- //js -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,700,500italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //fonts -->	
<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
		});
	</script>
<!--pop-up-->
<script src="<?php echo base_url('/assets/js/menu_jquery.js'); ?>"></script>
<!--//pop-up-->	
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="container">
			<div class="header-grids">
				<div class="logo">
					<h1><span>Go</span>vihar</h1>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			<div class="nav-top">
				<div class="top-nav">
					<span class="menu"><img src="<?php echo base_url('/assets/images/menu.png');?>" alt="" /></span>
					<ul class="nav1">
						<li class="active"><a href="<?php echo base_url()."Pesawat/"; ?>">Jadwal</a></li>
						<li><a href="<?php echo base_url()."User/dashboard"; ?>">History</a></li>
						<!-- <li><a href="<?php echo base_url()."Pesawat/read"; ?>">Pesawat</a></li>
						<li><a href="<?php echo site_url().'kota' ?>">Kota</a></li>
						<li><a href="<?php echo base_url()."Booking/read"; ?>">Booking</a></li>
						<li><a href="<?php echo base_url()."Penumpang/read/"; ?>">Penumpang</a></li> -->
			
					</ul>
					<div class="clearfix"> </div>
					<!-- script-for-menu -->
							 <script> 
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							
							</script>
						<!-- /script-for-menu -->
				</div>
				<div class="dropdown-grids">
						<div id="loginContainer"><a href="#" id="loginButton"><span>Options</span></a>
							<div id="loginBox">                
								<form>
									<div class="login-grids">
										<div class="login-grid-left">
											<fieldset>
												<div class="btn-group">
  													<a href="<?php echo base_url()."user/login"; ?>"><button type="button" class="btn btn-success">Login</button></a>
  													<a href="<?php echo base_url()."user/logout"; ?>"><button type="button" class="btn btn-danger">Logout</button></a>
												</div>
												
											</fieldset>
										</div>
									</div>
								</form>
							</div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//header-->