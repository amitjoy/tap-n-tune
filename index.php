<?php
require_once "lib/db.php";
?>
<!DOCTYPE html> 
<html id="home" lang="en"> 
<head> 
<meta charset=utf-8 />
<meta name="viewport" content="width=940" />
<!--WEB DEVELOPER : AMIT KUMAR MONDAL (ADMIN[at]AMITINSIDE.COM)-->
<title>Tap-N-Tune - Let's Harmonize!</title>

<!-- Theme Style -->
<link href="css/app/general.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style/style.css" type="text/css" />
<link rel="stylesheet" href="css/style/default.css" type="text/css" />
<link rel="icon" href="image/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
<link rel="alternate stylesheet" type="text/css" title="happy" href="css/style/happy.css" />
<link rel="alternate stylesheet" type="text/css" title="piano" href="css/style/piano.css" />
<link rel="alternate stylesheet" type="text/css" title="city" href="css/style/city.css" />
<link rel="alternate stylesheet" type="text/css" title="play" href="css/style/play.css" />
<link rel="alternate stylesheet" type="text/css" title="casette" href="css/style/casette.css" />
<link rel="alternate stylesheet" type="text/css" title="tape" href="css/style/tape.css" />

<!-- App Plugin Style -->
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!--[if IE 7]> <style> @import url("css/style/ie7.css"); </style> <![endif]-->

<!-- JS -->
<script src="js/jquery-1.4.2.min.js"></script>
<script src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/general.js"></script>
<script src="js/function.js"></script>
<script src="js/styleswitch.js"></script>
</head>
<body>
<!-- Container Start -->
<div class="container_16">
  
  <!-- Top Back -->
  <div id="top"></div>
  <div id="top-back"></div>
  
  <!-- Logo -->
  <div class="grid_3 logo">
    <img src="image/theme/logo.png" alt=""/>
  </div>
  
  <!-- Menu -->
  <div class="grid_11 menu">
    <ul class="sf-menu">
      <!-- Home -->
      <li class="current"><a href="index.php">Home</a></li>      
      
      <!-- Theme -->
      <li>
      <a href="#">Theme</a>
        <ul>
          <!--li><a href="#">Pages</a>
            <ul>
              <li><a href="index.php">Home Page</a></li>
              <li><a href="about.php">About Us</a></li>
              <li><a href="#">Blog</a>
                <ul>
                  <li><a href="blog.html">Blog Page</a></li>
                  <li><a href="blog-read.html">Blog Read (Single)</a></li>
                </ul>
              </li>
              <li><a href="#">Multi Media</a>
                <ul>
                <li><a href="music.php">Music Playlist</a></li>
                <li><a href="video.php">Video Playlist</a></li>
                <li><a href="band.php">Photograph Page</a></li>
                </ul>
              </li>
              <li><a href="#">Portfolio</a>
                <ul>
                <li><a href="portfolio-one.html">Portfolio One</a></li>
                <li><a href="portfolio-two.html">Portfolio Two</a></li>
                <li><a href="portfolio-three.html">Portfolio Three</a></li>
                <li><a href="portfolio-four.html">Portfolio Four</a></li>
                </ul>
              </li>
              <li><a href="services.html">Services</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </li-->
          
          <li><a href="#">Style</a>
            <ul>
              <li><a href="javascript:chooseStyle('none', 60)">Default style</a></li>
              <li><a href="javascript:chooseStyle('happy', 60)">Happy theme</a></li>
              <li><a href="javascript:chooseStyle('piano', 60)">Piano theme</a></li>
              <li><a href="javascript:chooseStyle('city', 60)">City theme</a></li>
              <li><a href="javascript:chooseStyle('play', 60)">Play theme</a></li>
              <li><a href="javascript:chooseStyle('casette', 60)">Casette theme</a></li>
              <li><a href="javascript:chooseStyle('tape', 60)">Tape theme</a></li>
            </ul>
          </li>
          
          <!--li><a href="#">Example</a>
            <ul>
              <li><a href="buttons.html">Buttons Example</a></li>
              <li><a href="ajax.html">Ajax Example</a></li>
            </ul>
          </li-->
          
        </ul>
      </li>
      
      <!-- Blog -->
      <!--li><a href="#">Blog</a>
        <ul>
          <li><a href="blog.html">Blog Page</a></li>
          <li><a href="blog-read.html">Blog Read (Single)</a></li>
        </ul>
      </li-->
      
      <!-- Media -->
      <li><a href="#">Media</a>
        <ul>
          <li><a href="music.php">Music Playlist</a></li>
          <li><a href="video.php">Video Playlist</a></li>
          <!--li><a href="band.php">Photograph Page</a></li-->
        </ul>
      </li>
       <li><a href="band.php">Bands</a>
      </li>
	   <li><a href="artist.php">Artists</a>
      </li>
      <!-- Portfolio -->
      <!--li><a href="#">Portfolio</a>
        <ul>
          <li><a href="portfolio-one.html">Portfolio One</a></li>
          <li><a href="portfolio-two.html">Portfolio Two</a></li>
          <li><a href="portfolio-three.html">Portfolio Three</a></li>
          <li><a href="portfolio-four.html">Portfolio Four</a></li>
        </ul>
      </li-->
      
      <!-- Help -->      
      <li><a href="#">Help</a>
        <ul>
          <li><a href="about.php">About</a></li>
          <!--li><a href="services.html">Services</a></li-->
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </li>
      
    </ul>
  </div>

  
  <!-- Mini Button -->
  <div class="grid_2 nav-button">
  	<a href="admin/" title="Admin Login Area" class="buton-login-mini"></a>
    <!--a href="signup.html" id="allpage-signup-top" title="Open Signup Modal Box" class="buton-signup-mini"></a-->
    <a href="search.php" id="allpage-search-top" title="Open Search Area" class="buton-search-mini"></a>
  </div>
  
  
  <!-- Big Message -->
  <div class="grid_11 top-message">
    <h1>Contrary to popular belief, If music be the food of love, play on.</h1>
  </div>
  
  <!-- Emty Grid -->
  <div class="grid_5">
  </div>

  
  <!-- Slide Show-->
  <div class="grid_16">
  <div id="slider-ribbon"></div>
  <div id="slider">
    <div id="slide-backs"></div>
    <div id="slides">
      <div class="slides_container">
        <a href="#"><img src="image/post/slide-1.png" width="919" height="326" alt=""  /></a>
        <a href="#"><img src="image/post/slide-2.png" width="919" height="326" alt=""  /></a>
        <a href="#"><img src="image/post/slide-3.png" width="919" height="326" alt=""  /></a>
        <a href="#"><img src="image/post/slide-4.png" width="919" height="326" alt=""  /></a>
      </div>
    </div>
    </div>
  </div>
  
  <!-- Hot News>
  <div id="hotnews-style" class="grid_12 hotnews-homepage">
    <h1><img src="image/theme/hotnews.png" alt=""  /> Hot News</h1>
    <ul id="news">
      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has industry's. <a href="#" title="Read More">» more</a></li>
      <li>Media Ipsum is simply dummy text of the printing and typesetting industry. Media industry's. <a href="#" title="Read More">» more</a></li>
      <li>Printing dummy text of the printing and typesetting industry. Media industry's. <a href="#" title="Read More">» more</a></li>
    </ul>
  </div>
  
  <!-- Login and Signup>
  <div class="grid_4" id="login-signup">
  <a href="login.html" id="homepage-login-button" class="green-button"><span class="green-right"></span><img src="image/theme/login-icon.png" alt="" class="button-icon"  /> Login</a>
  <a href="signup.html" id="homepage-signup-button" class="red-button"><span class="red-right"></span><img src="image/theme/icon-signup.png" alt="" class="button-icon"  /> Signup</a>
  </div>
  
</div>

<!-- Dot-->
<div class="dot"></div>

<!-- Top4 Start-->
<div class="container_16">

  <!-- Go!Music-->
  <div style="margin-left:2px;" class="grid_4 mini-advert">
    <div id="image-hover"><a href="#"><img src="image/theme/spacer.png" alt="" width="220" height="110" /></a></div>
    <img src="image/post/home-1.png" alt="" />
    <h1><span style="color:#e73b12;">Go!</span>Music</h1>
    <p>Don't change a thing. That's one of the best gimmicks a band could ever come up with.</p>
    <a href="music.php" class="grey-button" style=" margin-left:5px;"><span class="grey-right"></span><img src="image/theme/icon-music.png" alt="" class="button-icon"  /> Listen</a>
  </div>
  
  <!-- Go!Video-->
  <div class="grid_4 mini-advert">
    <div id="image-hover-two"><a href="#"><img src="image/theme/spacer.png" alt="" width="220" height="110" /></a></div>
    <img src="image/post/home-2.png" alt="" />
    <h1><span style="color:#809421;">Go!</span>Video</h1>
    <p>My approach is to be part of a band that makes music, not hit songs.That's sort of a given.</p>
    <a href="video.php" class="grey-button" style=" margin-left:5px;"><span class="grey-right"></span><img src="image/theme/icon-video.png" alt="" class="button-icon"  /> Watch</a>
  </div>
  
  <!-- Go!Band-->
  <div class="grid_4 mini-advert">
    <div id="image-hover-three"><a href="#"><img src="image/theme/spacer.png" alt="" width="220" height="110" /></a></div>
    <img src="image/post/home-3.png" alt="" />
    <h1><span style="color:#259ae0;">Go!</span>Band</h1>
    <p>I think anyone would want to see their favorite band in a small club over a large stadium.</p>
    <a href="band.php" class="grey-button" style=" margin-left:5px;"><span class="grey-right"></span><img src="image/theme/icon7.png" alt="" class="button-icon"  /> Explore</a>
  </div>
  
  <!-- Go!Billboard-->
  <div class="grid_4 mini-advert">
    <div id="image-hover-four"><a href="#"><img src="image/theme/spacer.png" alt="" width="220" height="110" /></a></div>
    <img src="image/post/home-4.png" alt="" />
    <h1><span style="color:#fba400;">Go!</span>Artist</h1>
    <p>Why do you have to retire at 65? Why can't you start at 70? You know, like wine. Why can't music be that way?</p>
    <a href="artist.php" class="grey-button" style=" margin-left:5px;"><span class="grey-right"></span><img src="image/theme/icon9.png" alt="" class="button-icon"  /> Look</a>
  </div>
  
</div>

<!-- Dot-->
<!--div class="dot" style="margin-top:26px;"></div-->

<!-- Latest Elements and New Videos Start>
<div class="container_16">

  <!-- Tab Menu Start >
  <div style="margin-left:1px; margin-top:-10px;" class="grid_8 latest-elements">
    <h1>Latest Element's</h1>
    <p>Lorem Ipsum is simply dummy text of the printing.</p>
    
    <!-- Tab Title >
    <div class='tabbed_content'>
      <div class='tabs'>
        <div class='moving_bg'>&nbsp;</div>
        <span class='tab_item'><span class="tabs-right"></span>News</span>
        <span class='tab_item'><span class="tabs-right"></span>Blog</span>
        <span class='tab_item'><span class="tabs-right"></span>Picture</span>
        <span class='tab_item'><span class="tabs-right"></span>List</span>
      </div>
    
      <!-- Tab Content >
      <div class='slide_content'>
      <div class='tabslider'>
        
        <!-- #1 >
        <ul class="tab-menu">
          <li>
          <a class="ajaxpicture" href="image/post/demo.jpg"><img src="image/post/tab-1.png" alt=""/></a>
          <span class="tab-date">30 JAN,2011</span>
          <a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a>
          <p>Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:-18px;"><span class="middle-right"></span>More</a>
          </li>
          <li>
          <a class="ajaxpicture" href="image/post/demo-2.jpg"><img src="image/post/tab-2.png" alt=""/></a>
          <span class="tab-date">14 JAN,2011</span>
          <a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a>
          <p>Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:-18px;"><span class="middle-right"></span>More</a>
          </li>
          <li>
          <a class="ajaxpicture" href="image/post/demo-3.jpg"><img src="image/post/tab-3.png" alt=""/></a>
          <span class="tab-date">07 JAN,2011</span>
          <a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a>
          <p>Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:-18px;"><span class="middle-right"></span>More</a>
          </li>
        </ul>
        
        <!-- #2 >
        <ul class="tab-menu">
          <li>
          <a class="ajaxpicture" href="image/post/demo.jpg"><img src="image/post/tab-4.png" alt=""/></a>
          <span class="tab-date">07 JAN,2011</span>
          <a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a>
          <p>Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:-18px;"><span class="middle-right"></span>More</a>
          </li>
          <li>
          <a class="ajaxpicture" href="image/post/demo-2.jpg"><img src="image/post/tab-5.png" alt=""/></a>
          <span class="tab-date">07 JAN,2011</span>
          <a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a>
          <p>Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:-18px;"><span class="middle-right"></span>More</a>
          </li>
          <li>
          <a class="ajaxpicture" href="image/post/demo-3.jpg"><img src="image/post/tab-6.png" alt=""/></a>
          <span class="tab-date">07 JAN,2011</span>
          <a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a>
          <p>Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:-18px;"><span class="middle-right"></span>More</a>
          </li>
        </ul>
        
        <!-- #3>
        <ul class="tab-menu-picture-list">
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-1.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-2.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-3.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-4.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-5.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-6.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-7.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-8.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-9.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-10.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-11.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-12.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-13.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-14.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-15.png" alt=""/></a></li>
          <li><a class="ajaxpicture" href="image/post/demo.jpg" title="Post Title is Here"><img src="image/post/tab-16.png" alt=""/></a></li>
        </ul>
        
        <!-- #4 >
        <ul class="tab-menu-list">
          <li><span class="tab-date">31 JAN,2011</span><a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a></li>
          <li><span class="tab-date">26 JAN,2011</span><a href="#" class="tab-menu-link">Ipsum is Simply Text Dummy Data</a></li>
          <li><span class="tab-date">22 JAN,2011</span><a href="#" class="tab-menu-link">Simply Text Of The Printing</a></li>
          <li><span class="tab-date">19 JAN,2011</span><a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text Data</a></li>
          <li><span class="tab-date">16 JAN,2011</span><a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a></li>
          <li><span class="tab-date">12 JAN,2011</span><a href="#" class="tab-menu-link">Ipsum is Simply Text Dummy Data</a></li>
          <li><span class="tab-date">09 JAN,2011</span><a href="#" class="tab-menu-link">Simply Text Of The Printing</a></li>
          <li><span class="tab-date">05 JAN,2011</span><a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text Data</a></li>
          <li><span class="tab-date">03 JAN,2011</span><a href="#" class="tab-menu-link">Text Dummy Of The Printing</a></li>
          <li><span class="tab-date">01 JAN,2011</span><a href="#" class="tab-menu-link">Lorem Ipsum is Simply Text</a></li>
        </ul>
        
      </div>
      </div>
      <!-- Content Finish >    
    </div>
    <!-- Tab Finish >  
  </div>
  <!-- Grid End>
  
  <!-- New Video Start >
  <div style="margin-left:9px; margin-top:-10px;" class="grid_8 latest-elements">
    <h1>New Video</h1>
    <p>Lorem Ipsum is simply dummy printing.</p>
    <div class="new-video">
      <iframe src="http://player.vimeo.com/video/10858472?title=0&amp;byline=0&amp;portrait=0" width="460" height="345"> </iframe>
      <h2>Lorem Ipsum is simply text convert dummy printing</h2>
      <p>Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing. Lorem Ipsum is simply text convert dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing.</p>
      <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:3px;"><span class="middle-right"></span>More</a>
      <a href="#" class="middle-button" style="float:right; margin-bottom:8px; margin-top:3px;"><span class="middle-right"></span>Video</a>
    </div>
  </div>
  <!-- End >
</div>

<!-- Dot>
<div class="dot" style="margin-top:26px;"></div>

<!-- Poster Back>
<div id="random-poster-back"></div>
<div class="container_16">
  
  <!-- Random Poster Start>
  <div id="random-poster" class="grid_16">
    <h1>Random Poster's</h1>
    <p>Lorem Ipsum is simply dummy text of the printing.</p>
    <ul id="mycarousel" class="jcarousel-skin-tango">
      <li><a rel="picture-album" href="image/post/demo.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-1.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo-2.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-2.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo-3.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-3.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-4.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo-2.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-5.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo-3.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-6.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-7.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo-2.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-8.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo-3.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-9.png" width="147" height="147" alt="" /></a></li>
      <li><a rel="picture-album" href="image/post/demo.jpg" title="Lorem ipsum dolor sit amet"><img src="image/post/mini-slide-10.png" width="147" height="147" alt="" /></a></li>
    </ul>
  </div>
  <!-- Random Poster End-->
  
  <!-- New Users>
  <div id="new-users" class="grid_8">
    <h1>New User's</h1>
    <p>Lorem Ipsum is simply dummy text of the printing.</p>
    <ul>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user1.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user2.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user3.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user4.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user5.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user6.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user7.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user8.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user9.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user10.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user11.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user12.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user13.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user14.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user15.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user16.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user17.png" alt="" /></a></li>
      <li><a href="#" title="User Name is Here"><span class="user-mask"></span><img src="image/post/user18.png" alt="" /></a></li>
    </ul>
  </div>
  
  <!-- New Comments-->
  <!--div id="new-comments" class="grid_8">
    <h1>New Comment's</h1>
    <p>Lorem Ipsum is simply dummy text of the printing.</p>
    <ul>
    <li><span style="font-weight:bold"><a href="#">iamilkay</a> says:</span> Lorem Ipsum is simply dummy text of the printing and type setting dummy text of printing industry.</li>
    <li><span style="font-weight:bold"><a href="#">iamilkay</a> says:</span> Lorem Ipsum is simply dummy text of the printing and type setting dummy text of printing industry.</li>
    <li><span style="font-weight:bold"><a href="#">iamilkay</a> says:</span> Lorem Ipsum is simply dummy text of the printing and type setting dummy text of printing industry.</li>
    <li><span style="font-weight:bold"><a href="#">iamilkay</a> says:</span> Lorem Ipsum is simply dummy text of the printing and type setting dummy text of printing industry.</li>
    </ul>
  </div-->
</div>

<!-- Footer Back-->
<div id="footer-back"></div>
<div class="container_16">
  <div id="footer-register" class="grid_8">
    <p>Copyright © <?=date('Y');?> Tap-N-Tune.com. All rights reserved. </p>
    <ul>
      <li><a href="index.php">Home Page</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </div>
  <?php
  $sql = mysql_fetch_array(mysql_query("SELECT * FROM _social WHERE active=1"));
  ?>
  <div id="footer-social" class="grid_8">
    <ul>
     <li><a href="<?=$sql['twitter'];?>"><img src="image/theme/twitter.png" alt="" /></a></li>
      <li><a href="<?=$sql['facebook'];?>"><img src="image/theme/facebook.png" alt="" /></a></li>
      <li><a href="<?=$sql['google'];?>"><img src="image/theme/google.png" alt="" /></a></li>
    </ul>
  </div>
</div>
<script> 
$("#allpage-login-top").pageSlide({ width: "350px", direction: "left" });
$("#allpage-signup-top").pageSlide({ width: "350px", direction: "right" });
$("#allpage-search-top").pageSlide({ width: "350px", direction: "left", modal: true });
$("#homepage-login-button").pageSlide({ width: "350px", direction: "left" });
$("#homepage-signup-button").pageSlide({ width: "350px", direction: "right" });
</script>
</body> 
</html>