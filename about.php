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
      <!-- Portfolio >
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
  </div>

  
  <!-- Mini Button -->
  <div class="grid_2 nav-button">
  	<a href="admin/" title="Admin Login Area" class="buton-login-mini"></a>
    <!--a href="signup.html" id="allpage-signup-top" title="Open Signup Modal Box" class="buton-signup-mini"></a-->
    <a href="search.php" id="allpage-search-top" title="Open Search Area" class="buton-search-mini"></a>
  </div>
  
  
  <!-- Big Message -->
  <div class="grid_11 top-message">
    <h1>A painter paints pictures on canvas.  But musicians paint their pictures on silence</h1>
  </div>
  
  <!-- Emty Grid -->
  <div class="grid_5">
  </div>
  
  <div class="grid_16 blog-page">
    <h1>Discovery Us</h1>
    <h2 class="blog-page-space">Music is what feelings sound like</h2> 
  </div>
  <?php
  $sql = mysql_fetch_array(mysql_query("SELECT * FROM _about WHERE active = 1"));
  ?>
  <!-- Detail -->
  <div style="margin:14px 0px 0px 0px;" class="grid_11 post-blog-read">
    <img src="image/post/left-image2.png" alt="" class="image-left" />
    <p><?=$sql['para1'];?></p>
    <p><?=$sql['para2'];?></p>
    <img src="image/post/right-image2.png" alt="" class="image-right" />
	<p><?=$sql['para3'];?></p>
	<p><?=$sql['para4'];?></p>
  </div>
  <?php
  $sql = mysql_query("SELECT * FROM _owner WHERE active=1");
  while($r = mysql_fetch_array($sql))
  {
	$pic = ($r['sex'] == 2) ? "user1" : "user2";
	echo "
	<div class='grid_5 about'>
    <img src='image/post/".$pic.".png' alt=''/>
    <p style='padding-bottom:6px; font-size:12px;'><strong><a href='#'>".$r['name']."</a></strong></p>
    <p><strong>Mail:</strong> ".$r['mail']."</p>
  </div>
	";
  }
  ?>
  <!-- Team #1>
  <div class="grid_5 about">
    <img src="image/post/user1.png" alt=""/>
    <p style="padding-bottom:6px; font-size:12px;"><strong><a href="#">Marie Do</a></strong></p>
    <p><strong>Mail:</strong> marie@domain.com</p>
    <p><strong>Job</strong> » Team Manager</p>
  </div>
  
  <!-- Team #2>
  <div class="grid_5 about">
    <img src="image/post/user2.png" alt=""/>
    <p style="padding-bottom:6px; font-size:12px;"><strong><a href="#">John Do</a></strong></p>
    <p><strong>Mail:</strong> john@domain.com</p>
    <p><strong>Job</strong> » Web Design</p>
  </div>
  
  <!-- Team #3>
  <div class="grid_5 about">
    <img src="image/post/user3.png" alt=""/>
    <p style="padding-bottom:6px; font-size:12px;"><strong><a href="#">Smith Do</a></strong></p>
    <p><strong>Mail:</strong> smith@domain.com</p>
    <p><strong>Job</strong> » Support Staf</p>
  </div>
  
  <!-- Team #4>
  <div class="grid_5 about">
    <img src="image/post/user4.png" alt=""/>
    <p style="padding-bottom:6px; font-size:12px;"><strong><a href="#">Stefan Do</a></strong></p>
    <p><strong>Mail:</strong> smith@domain.com</p>
    <p><strong>Job</strong> » Office Staf</p>
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