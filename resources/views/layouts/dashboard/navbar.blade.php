<!---header---->			
<div class="header">  
    <div class="container mb-5">
         <div class="logo">
             <a href="/"><img src="{{ asset('storage/' . $konfigurasi->gambar) }}" width="156" height="92" title="" /></a>
         </div>
            <!---start-top-nav---->
            <div class="top-menu">
                <div class="search">
                    <form action="{{ route('welcome') }}">
                    <input type="text" name="keyword" placeholder="dig dirt here..." value="{{ request('keyword') }}" required="">
                    <button type="submit"></button>
                    </form>
                </div>
                 <span class="menu"> </span> 
                  <ul>
                       <li class="{{ set_active (['/','welcome'])}}"><a href="{{ route('welcome') }}">HOME</a></li>						
                       <li class="{{ set_active (['about']) }}"><a href="{{ route('about') }}">ABOUT</a></li>	
                       <li class="{{ set_active (['contact']) }}"><a href="{{ route('contact') }}">CONTACT</a></li>	
                       <img class="img-separator-image" src="{{ asset('Lang_tang.jpg') }}" alt="">					
            </div>
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
<!--/header-->