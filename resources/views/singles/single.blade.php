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
{{-- 	
<div class="single">
	 <div class="container"> --}}
		  <div class="col-md-8 single-main">				 
			  <div class="single-grid">
					<img src="{{ asset('storage/' . $data->gambar) }}" alt=""/>	
					<h1>{{ $data->judul }}</h1>
					{{-- <p>{{$data->created_at->toDateString();}}</p> --}}
					<p>{{date('d M Y H:i:s', strtotime($data->created_at))}} / <a class="single-page-topik" href="{{ route('spesifik', $data->topik) }}">{{ $data->topik }}</a> </p> 
					<p><?= $data->isi?> </p>
					<h5 class="post-author_head">Written by {{ $data->user->name }} <br>
					<a style="font-size: 13px;" href="{{ route('byauthor', $data->user->name) }}" title="Posts by {{ $data->user->name }}" rel="author">Click here to view all posts written by {{ $data->user->name }}</a></h5>

					 					 
			  </div>
			 <ul class="comment-list">
		  		   <h5 class="post-author_head">All Comments <a href="#" title="Posts by admin" rel="author"></a></h5>
		  		   <li><img src="images/avatar.png" class="img-responsive" alt="">
		  		   <div class="desc"  >
		  		   
					   
					@foreach ($commentsByPostingId as $comment)
						 <h5 class="comment-author">{{ $comment->name }}<a href="#" title="Posts by admin" rel="author"></a></h5>
						 <h5>{{ $comment->message }} </h5>
						 <h5 style="color: #848484; font-size: 11px;" class="comment-date">{{$comment->created_at->diffForHumans()}}</h5>
						 <hr>
						 
					@endforeach

				   
		  		   </div>
		  		   <div class="clearfix"></div>
		  		   </li>
		  	  </ul>
			  <div class="content-form">
					 <h3>Leave a comment</h3>
					<form action="{{ route('store-comment') }}" method="POST" enctype="multipart/form">
						@csrf
						<input type="hidden" name="post_id" value="{{$data->id}}">

						<div>
							<input type="text" placeholder="Name" name="name" class="comment-name @error('name') is-invalid @enderror"  />
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						
						<div>
							<input type="text" placeholder="Email" name="email" class="comment-name @error('email') is-invalid @enderror" />
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div>
							<input type="text" placeholder="Phone" name="phone" class="comment-name @error('phone') is-invalid @enderror" />
							@error('phone')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>

						<div>
							<textarea placeholder="Message" name="message" class="comment-name @error('phone') is-invalid @enderror"></textarea>
							@error('message')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<input type="submit" value="SEND"/>
				   </form>
						 </div>
		  </div>

			  {{-- <div class="col-md-4 side-content">
				 <div class="recent">
					 <h3>RECENT POSTS</h3>
					 <ul>
					 <li><a href="#">Aliquam tincidunt mauris</a></li>
					 <li><a href="#">Vestibulum auctor dapibus  lipsum</a></li>
					 <li><a href="#">Nunc dignissim risus consecu</a></li>
					 <li><a href="#">Cras ornare tristiqu</a></li>
					 </ul>
				 </div>
				 <div class="comments">
					 <h3>RECENT COMMENTS</h3>
					 <ul>
					 <li><a href="#">Amada Doe </a> on <a href="#">Hello World!</a></li>
					 <li><a href="#">Peter Doe </a> on <a href="#"> Photography</a></li>
					 <li><a href="#">Steve Roberts  </a> on <a href="#">HTML5/CSS3</a></li>
					 </ul>
				 </div>
				 <div class="clearfix"></div>
				 <div class="archives">
					 <h3>ARCHIVES</h3>
					 <ul>
					 <li><a href="#">October 2013</a></li>
					 <li><a href="#">September 2013</a></li>
					 <li><a href="#">August 2013</a></li>
					 <li><a href="#">July 2013</a></li>
					 </ul>
				 </div>
				 <div class="categories">
					 <h3>CATEGORIES</h3>
					 <ul>
					 <li><a href="#">Vivamus vestibulum nulla</a></li>
					 <li><a href="#">Integer vitae libero ac risus e</a></li>
					 <li><a href="#">Vestibulum commo</a></li>
					 <li><a href="#">Cras iaculis ultricies</a></li>
					 </ul>
				 </div>
				 <div class="clearfix"></div>
			  </div> --}}
			  {{-- <div class="clearfix"></div> --}}
			  @include('layouts.dashboard.sidebar')

		  {{-- </div> --}}
	  {{-- </div>
</div> --}}

@endsection

	
