{{-- sidebar start --}}

<div class="col-md-4 content-right">
    <div class="recent">
        <h3>RECENT POSTS</h3>
        <ul>
            @foreach ($recentpost as $recent)
        <li><a href="{{ route('single', $recent->id) }}">{{ $recent->judul }}</a></li>
            @endforeach
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
            @foreach ($archive as $bulan)
        <li><a href=""> {{date(' M Y', strtotime($bulan->bulan))}} </a></li>
            @endforeach
        </ul>
    </div>
        
    <div class="categories">
        <h3>CATEGORIES</h3>
        <ul>
       @foreach ($topik as $posting)
        <li><a href="{{ route('spesifik', $posting->topik) }}">{{ $posting->topik }}</a></li>
        @endforeach

        </ul>
    </div>
    <div class="clearfix"></div>
 </div>
    <div class="clearfix"></div>

{{-- sidebar end --}}