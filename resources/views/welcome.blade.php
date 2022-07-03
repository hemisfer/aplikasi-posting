<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


{{-- <head>
	<title>Berita #1</title>
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
		<link href="https://fonts.googleapis.com/css2?family=Jacques+Francois&display=swap" rel="stylesheet">
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
			  <a href="index.html"><img src="{{ asset('storage/' . $konfigurasi[0]->gambar) }}" width="156" height="92" title="" /></a>
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
	

			 <div class="col-md-8 content-main">
				 <div class="content-grid">	
					@forelse ($post as $posting)
					<div class="content-grid-info">
						<img class="front-pic" src="{{ asset('storage/' . $posting->gambar) }}" width="669" height="320" alt=""/>
						<div class="post-info">
						<h4><a href="{{ route('single', $posting->id) }}">{{ $posting->judul }}</a> {{$posting->created_at->diffForHumans()}} / {{ $posting->user->name }}</h4>
						<p> <?php echo htmlspecialchars_decode(\Illuminate\Support\Str::limit($posting->isi, 180, '...'))?></p>
						<a href="{{ route('single', $posting->id) }}""><span></span>READ MORE</a> / {{ $posting->topik }}
						</div>
					</div>	
					@empty
						<h4>0 results fetched!</h4>
					@endforelse
					
				 </div>
			  </div>

			  @include('layouts.dashboard.sidebar')
			  {{-- <div class="col-md-4 content-right">
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
				    @foreach ($topik as $posting)
					 <li><a href="{{ route('welcome', $posting->topik) }}">{{ $posting->topik }}</a></li>
					 @endforeach

					 </ul>
				 </div>
				 <div class="clearfix"></div>
			  </div> --}}
			 
@endsection
	
