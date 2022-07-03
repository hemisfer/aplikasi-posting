<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
{{-- <!DOCTYPE HTML>
<html>
<head>
	<title>{{ $data->judul }}</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Personal Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
	/>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!--end slider -->
		<!--script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!---->

</head>
<body>
<!---header---->			
<div class="header">  
	 <div class="container">
		  <div class="logo">
			  <a href="index.html"><img src="images/logo.jpg" title="" /></a>
		  </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				 <div class="search">
					 <form>
					 <input type="text" placeholder="" required="">
					 <input type="submit" value=""/>
					 </form>
				 </div>
				  <span class="menu"> </span> 
				   <ul>
						<li class="active"><a href="/">HOME</a></li>						
						<li><a href="about.html">ABOUT</a></li>	
						<li><a href="contact.html">CONTACT</a></li>						
						<div class="clearfix"> </div>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->					
	 </div>
</div>
<!--/header--> --}}


@extends('layouts.dashboard.master')

@section('content')
{{-- <div class="about-content">
	<div class="container">
		<div class="about-section"> --}}
		{{-- 	<div class="about-grid">
				<div class="about-grid2"> --}}
					<?php echo htmlspecialchars_decode ($konfigurasi->about) ?>
				{{-- </div>
				<div class="who-iam"></div>
				<div class="man-info"></div> --}}



	
		{{-- <h2>Something About Me and Blogging</h2>
		<div class="about-section">
			<div class="about-grid">
				<h3>WHY I STARTED THIS BLOG?</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
				It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
				versions of Lorem Ipsum.</p>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages 
				and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
			</div>
			<div class="about-grid2">
				<h3>WHY YOU SHOULD READ THIS BLOG?</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
				It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
				versions of Lorem Ipsum.</p>	
				<ul>
					<li><a href="#">Always free from repetition</a></li>
					<li><a href="#">Vestibulum rhoncus nibh quis dui fermentum iaculis.</a></li>
					<li><a href="#">The standard chunk of Lorem Ipsum</a></li>
					<li><a href="#">In consequat dolor in lorem egestas ultrices.</a></li>
					<li><a href="#">Ultrices rhoncus nibh quis dui.</a></li>
				</ul>	
			</div>
			<div class="who-iam">
				<h3>WHO THE IAM?</h3>
				<div class="man-info">
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
					<h4>Some facts about me.</h4>  
					<li>Nullam at turpis a orci pretium pharetra.</li>
					<li>Curabitur tincidunt purus mollis facilisis placerat.</li>
					<li>Mauris a nulla ac est tincidunt interdum.</li>
					<li>Pellentesque vel enim nec urna imperdiet mollis.</li>
					<li>Integer interdum risus et scelerisque volutpat.</li>
				</div>
				<div class="man-pic">
				<img src="images/man.jpg" alt=""/>
				</div>
				<div class="clearfix"></div>
			</div>			 
		 </div>		  --}}
	
<!---->
{{-- <div class="footer">
	<div class="container">
	<p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
	</div>
</div> --}}

@endsection

	
