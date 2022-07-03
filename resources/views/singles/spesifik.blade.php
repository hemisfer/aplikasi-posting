@extends('layouts.dashboard.master')

@section('content')
	
		 <div class="col-md-8 content-main">
				 <div class="content-grid">	
					@foreach ($post as $posting)
													 
					 <div class="content-grid-info">
						 <img class="front-pic" src="{{ asset('storage/' . $posting->gambar) }}" width="669" height="320" alt=""/>
						 <div class="post-info">
						 <h4><a href="{{ route('single', $posting->id) }}">{{ $posting->judul }}</a> {{$posting->created_at->diffForHumans()}} / {{ $posting->user->name }}</h4>
						 <p> <?php echo htmlspecialchars_decode(\Illuminate\Support\Str::limit($posting->isi, 180, '...'))?></p>
						 <a href="{{ route('single', $posting->id) }}""><span></span>READ MORE</a> / {{ $posting->topik }}
						 </div>
					 </div>
					 @endforeach	
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
	