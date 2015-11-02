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
<link rel="stylesheet" href="thickbox/thickbox.css" type="text/css" media="screen" />
<!--[if IE 7]> <style> @import url("css/style/ie7.css"); </style> <![endif]-->

<!-- JS -->
<script src="js/jquery-1.4.2.min.js"></script>
<script src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/general.js"></script>
<script src="js/function.js"></script>
<script type="text/javascript" src="js/filter.js"></script>
<script src="js/styleswitch.js"></script>
<script type="text/javascript" src="thickbox/thickbox.js"></script>
</head>
<body>

<!-- Container Start -->
<div class="container_16">
  
  <!-- Top Back -->
  <div id="top"></div>
  <div id="top-back-two"></div>
  
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
      
      <!-- Blog >
      <li><a href="#">Blog</a>
        <ul>
          <li><a href="blog.html">Blog Page</a></li>
          <li><a href="blog-read.html">Blog Read (Single)</a></li>
        </ul>
      </li>
      
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
      <!-- Portfolio>
      <li><a href="#">Portfolio</a>
        <ul>
          <li><a href="portfolio-one.html">Portfolio One</a></li>
          <li><a href="portfolio-two.html">Portfolio Two</a></li>
          <li><a href="portfolio-three.html">Portfolio Three</a></li>
          <li><a href="portfolio-four.html">Portfolio Four</a></li>
        </ul>
      </li>
      
      <!-- Help -->      
      <li><a href="#">Help</a>
        <ul>
          <li><a href="about.php">About</a></li>
          <!--li><a href="services.html">Services</a></li-->
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </li>
      
    </ul>
  </div><!-- Mini Button -->
  <div class="grid_2 nav-button">
  	<a href="admin/" title="Admin Login Area" class="buton-login-mini"></a>
    <!--a href="signup.html" id="allpage-signup-top" title="Open Signup Modal Box" class="buton-signup-mini"></a-->
    <a href="search.php" id="allpage-search-top" title="Open Search Area" class="buton-search-mini"></a>
  </div>
  
  
  <!-- Big Message -->
  <div class="grid_11 top-message">
    <h1>This is band page overview, contrary to popular belief, It has roots</h1>
  </div>
  
  <!-- Emty Grid -->
  <div class="grid_5">
  </div>
  
  <div class="grid_16 blog-page">
    <h1>Just Look</h1>
    <h2 class="blog-page-space">Turns out, not where, but who you're with that really matters</h2>
  </div>
  
  <div class="grid_16 list-page">
  
  <!-- Filter-->
    <ul class="splitter">
      <li>
        <ul>
		<li><a href="#" id="allcat" class="middle-button" ><span class="middle-right"></span>All </a></li>
		<?php
		$sql = mysql_query("SELECT * FROM _genres WHERE active=1");
		while($r = mysql_fetch_array($sql))
		{
		echo "<li><a href='#' id='".$r['genre_name']."' class='filter middle-button' ><span class='middle-right'></span>".$r['genre_name']." </a></li>";
		}
		?>
         <!-- <li><a href="#" id="allcat" class="middle-button" ><span class="middle-right"></span>All </a></li>
          <li><a href="#" id="cover" class="filter middle-button" ><span class="middle-right"></span>Cover </a></li>
          <li><a href="#" id="poster" class="filter middle-button" ><span class="middle-right"></span>Poster </a></li>
          <li><a href="#" id="magazine" class="filter middle-button" ><span class="middle-right"></span>Magazine </a></li>
        -->
		</ul>
      </li>
    </ul>   
    <div style="clear:both"></div>
    
    <div id="listing">
    <?php
	$sql = mysql_query("SELECT * FROM _bands WHERE active = 1");
	while($r = mysql_fetch_array($sql))
	{
	$sql2 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$r['genre']." AND active = 1"));
	echo "
	<div class='discounted-item ".$sql2['genre_name']." photo-playlist'>		
      <a class='thickbox' href='band_detail.php?id=".$r['idband']."&keepThis=true&TB_iframe=true&height=500&width=400' title='".$sql2['genre_name']."'><img src='admin/uploads/gallery/190x160/".$r['poster']."' alt='' class='photo-playlist-left'></a>
      <h1>".$r['band_name']."</h1><a href='search_pro.php?search=".$r['band_name']."&sel=1&result=b&id=tnt_search_".rand(15662,34555)."'' title='Explore Music and Video'><img src='image/theme/explore.png' alt='' class='explore-playlist-band'  /></a>
	</div>
	";
	}
	?>
    <!-- #1 >
    <div class="discounted-item poster photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo1.png" alt="" class="photo-playlist-left"></a>
      <h1>Kool Shen</h1>
	</div>
    
    <#2 >
    <div class="discounted-item poster photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo2.png" alt="" class="photo-playlist-left"></a>
      <h1>Kelis</h1>
	</div> 
    
    < #3 >
    <div class="discounted-item poster photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo3.png" alt="" class="photo-playlist-left"></a>
      <h1>Jennifer Lopez</h1>
	</div>
    
    <#4 >
    <div class="discounted-item poster photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo4.png" alt="" class="photo-playlist-left"></a>
      <h1>50 Cent</h1>
	</div>
    
    <#5 >
    <div class="discounted-item magazine photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo5.png" alt="" class="photo-playlist-left"></a>
      <h1>Akon - Magazine</h1>
	</div>
    
    <#6 >
    <div class="discounted-item magazine photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo6.png" alt="" class="photo-playlist-left"></a>
      <h1>Robert Pattinson</h1>
	</div>
    
    <#7 >
    <div class="discounted-item magazine photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo7.png" alt="" class="photo-playlist-left"></a>
      <h1>Emma Watson</h1>
	</div>
    
    < #8 >
    <div class="discounted-item magazine photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo8.png" alt="" class="photo-playlist-left"></a>
      <h1>Keanu Reeves</h1>
	</div>
    
    <#9 >
    <div class="discounted-item cover photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo9.png" alt="" class="photo-playlist-left"></a>
      <h1>Nirvana</h1>
	</div>
    
    < #10 >
    <div class="discounted-item cover photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo10.png" alt="" class="photo-playlist-left"></a>
      <h1>Madonna</h1>
	</div>
    
    <#11 >
    <div class="discounted-item cover photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo11.png" alt="" class="photo-playlist-left"></a>
      <h1>T-Pain</h1>
	</div>
    
    < #12 >
    <div class="discounted-item cover photo-playlist">		
      <a class="picture" href="image/post/demo.jpg" title="Look Picture"><img src="image/post/photo12.png" alt="" class="photo-playlist-left"></a>
      <h1>Think Tank</h1>
	</div>       
	-->
    </div>
    
    <div style="clear:both"></div>
    <!-- Page Navi -->
    <!--div class="page-navi" style="margin:-18px 0px 0px -10px;">
      <ul>
        <li><a href="#" class="middle-button" style="min-width:24px;"><span class="middle-right"></span>1</a></li>
        <li><a href="#" class="middle-button" style="min-width:24px;"><span class="middle-right"></span>2</a></li>
        <li><a href="#" class="middle-button" style="min-width:24px;"><span class="middle-right"></span>3</a></li>
        <li><a href="#" class="middle-button" style="min-width:24px;"><span class="middle-right"></span>4</a></li>
        <li><a href="#" class="middle-button" style="min-width:24px;"><span class="middle-right"></span>»</a></li>
      </ul>
    </div-->  
  </div>
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