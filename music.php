<?php
error_reporting(0);
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
<style>
input.amit_button { 
    position: relative; 
    z-index: 1;
    overflow: visible; 
    display: inline-block; 
    padding: 0.4em 0.7em 0.375em; 
    border: 1px solid #999; 
    border-bottom-color: #888;
    margin: 40;
	float:none;
    text-decoration: none; 
    text-align: center;
    font: bold 13px/normal 'lucida grande', tahoma, verdana, arial, sans-serif; 
    white-space: nowrap; 
    cursor: pointer; 
    outline: none;
    color: #333; 
    background-color: #eee;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f5f6f6), to(#e4e4e3));
    background-image: -moz-linear-gradient(#f5f6f6, #e4e4e3);
    background-image: -o-linear-gradient(#f5f6f6, #e4e4e3);
    background-image: linear-gradient(#f5f6f6, #e4e4e3);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f5f6f6', EndColorStr='#e4e4e3'); /* for IE 6 - 9 */
    -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #fff;
    -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #fff;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #fff;
	 border-color: #3b6e22 #3b6e22 #2c5115;
    color: #fff;
    background-color: #69A74E;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#75ae5c), to(#67a54b));
    background-image: -moz-linear-gradient(#75ae5c, #67a54b);
    background-image: -o-linear-gradient(#75ae5c, #67a54b);
    background-image: linear-gradient(#75ae5c, #67a54b);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#75ae5c', EndColorStr='#67a54b'); /* for IE 6 - 9 */
    -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #98c286;
    -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #98c286;
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1), inset 0 1px 0 #98c286;
    /* IE hacks */
    zoom: 1; 
    display: inline; 
}

input.amit_button:hover,
input.amit_button:focus,
input.amit_button:active {
    border-color: #777 #777 #666;
}

input.amit_button:active {
    border-color: #aaa;
    background: #ddd;
    filter: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
	 border-color: #3B6E22;
    background: #609946;
    filter: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
</style>
<!-- App Plugin Style -->
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<!--[if IE 7]> <style> @import url("css/style/ie7.css"); </style> <![endif]-->

<!-- JS -->
<script src="js/jquery-1.4.2.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/general.js"></script>
<script src="js/function.js"></script>
<script type="text/javascript" src="js/filter.js"></script>
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
    <h1>This is music page playlist, contrary to popular belief, It has roots</h1>
  </div>
  
  <!-- Emty Grid -->
  <div class="grid_5">
  </div>
  
  <div class="grid_16 blog-page">
    <h1>Just Listen</h1>
    <h2 class="blog-page-space">Music happens to be an art form that transcends language</h2>
  </div>
  
  <div class="grid_16 list-page">
  
  <!-- Filter-->
    <ul class="splitter">
      <li>
        <ul>
		<li><a href="#" id="allcat" class="middle-button" ><span class="middle-right"></span>All </a></li>
		<?php
		$sql = mysql_query("SELECT * FROM _genres WHERE active = 1");
		while($r = mysql_fetch_array($sql))
		{
		echo "<li><a href='#' id='".$r['genre_name']."' class='filter middle-button' ><span class='middle-right'></span>".$r['genre_name']." </a></li>";
		}
		?>
          <!--<li><a href="#" id="allcat" class="middle-button" ><span class="middle-right"></span>All </a></li>
          <li><a href="#" id="pop" class="filter middle-button" ><span class="middle-right"></span>Pop </a></li>
          <li><a href="#" id="hiphop" class="filter middle-button" ><span class="middle-right"></span>Hiphop </a></li>
          <li><a href="#" id="rnb" class="filter middle-button" ><span class="middle-right"></span>RnB </a></li>
          <li><a href="#" id="rock" class="filter middle-button" ><span class="middle-right"></span>Rock </a></li>
		  -->
        </ul>
      </li>
    </ul>   
    <div style="clear:both"></div>
    <script>
	function like(cid)
{
	$.ajax({
	type: "POST",
	url: "getAjax.php",
	data: "id=like&audio_id="+cid,
	success: function(msg){
		//alert(msg);
		//document.getElementById("likes").value = msg;
		$(".tnt_"+cid).val(msg); //versions older than 1.6
		$.cookie("tnt_"+cid, "yes", { expires: 2 });
		$.cookie("tnt_"+cid);
		$(".tnt_"+cid).attr("onclick", "javascript: alert('foo');");
	}

	});
}
	</script>
    <div id="listing">
    <?php
	$sql = mysql_query("SELECT * FROM _audio WHERE active=1");
	//$_COOKIE = array();
	//print_r($_COOKIE);
	$i = 0;
	while($r = mysql_fetch_array($sql))
	{
	$sql2 = mysql_fetch_array(mysql_query("SELECT * FROM _bands WHERE idband = ".$r['band']." AND active = 1"));
	$sql3 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql2['genre']." AND active = 1"));
	$sql4 = mysql_fetch_array(mysql_query("SELECT * FROM _artist WHERE idartist = ".$r['artist']." AND active = 1"));
	$sql5 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql4['genre']." AND active = 1"));
	$genre = isset($sql3['genre_name']) ? $sql3['genre_name'] : $sql5['genre_name'];
	$band = $sql2['band_name'] ? "Band: ".$sql2['band_name'] : $sql4['name'];
	$func = "like(".$r['idaudio'].");";
	$count = $r['likes'] ? "(".$r['likes'].")" : "";
	$button = ($_COOKIE['tnt_'.$r['idaudio']]=="yes") ? "Liked ".$count : "Like ".$count;
	$link = ($_COOKIE['tnt_'.$r['idaudio']]=="yes") ? "#" : $func;
	echo "
	 <div class='discounted-item ".$genre." music-playlist'>		
	 <a class='picture' title='".$band."' href='admin/uploads/gallery/38x38/".$r['audio_pic']."'>  
      <img src='admin/uploads/gallery/38x38/".$r['audio_pic']."' alt='' class='music-playlist-left'  />
	  </a>
      <h1>".$r['title']."</h1>
      <p>".$r['caption']."</p>
      <a class='code' href='#00".++$i."' title='Listen!'><img src='image/theme/play.png' alt='' class='music-playlist-right'  /></a>
      <div style='display: none;'>
        <div id='00".$i."' style='width:400px;height:90px;overflow:auto;'>
		<embed type='application/x-shockwave-flash' src='amit_player/amit-player.swf' flashvars='audioUrl=admin/uploads/audios/".$r['localfile']."' width='400' height='20' quality='best'></embed>
		 <br/><div align='center'>Playing ".$r['title']."</div>
		 <div align='center'><input type='button' id='likes' onclick='".$link."' class='amit_button tnt_".$r['idaudio']."' value='".$button."'></div>
         </div>
       </div>	
	</div>
	";
	}
	?>
    <!-- #1>
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album1.png" alt="" class="music-playlist-left"  />
      <h1>Pipi Keny</h1>
      <p>'Not Afraid'</p>
      <a class="code" href="#001" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt="" class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="001" style="width:400px;height:110px;overflow:auto;">
          <object height="360" width="100%"> <param name="movie" value="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Fplaylists%2F162536"></param> <param name="allowscriptaccess" value="always"></param> <embed allowscriptaccess="always" height="360" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Fplaylists%2F162536" type="application/x-shockwave-flash" width="100%"></embed> </object>  <span><a href="http://soundcloud.com/artenativo-radio/sets/keny-arkana">::: Keny Arkana :::</a> by <a href="http://soundcloud.com/artenativo-radio">artenativo.radio</a></span> 
         </div>
       </div>	
	</div>
    
    <!-- #2 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album2.png" alt=""  class="music-playlist-left" />
      <h1>Pipi Rihanna</h1>
      <p>'Grenade'</p>
      <a class="code" href="#002" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="002" style="width:400px;height:110px;overflow:auto;">
          <object height="81" width="100%"> <param name="movie" value="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8763854"></param> <param name="allowscriptaccess" value="always"></param> <embed allowscriptaccess="always" height="81" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8763854" type="application/x-shockwave-flash" width="100%"></embed> </object>  <span><a href="http://soundcloud.com/luis-rondina/rihanna-vs-axwell-steve-angello-only-girl-tell-me-why-luis-rondina-bootleg">Rihanna Vs Axwell & Steve Angello - Only Girl Tell Me Why (Luis Rondina Bootleg)</a> by <a href="http://soundcloud.com/luis-rondina">Luis Ròndina</a></span> 
         </div>
       </div>	
	</div>
    
    <!-- #3>
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album3.png" alt=""  class="music-playlist-left" />
      <h1>Pink</h1>
      <p>'F**kin Perfect'</p>
      <a class="code" href="#003" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="003" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #4 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album4.png" alt=""  class="music-playlist-left" />
      <h1>Katy Perry</h1>
      <p>'Firework'</p>
      <a class="code" href="#004" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="004" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #5 >
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album5.png" alt=""  class="music-playlist-left" />
      <h1>Wiz Khalifa</h1>
      <p>'Black And Yellow'</p>
      <a class="code" href="#005" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="005" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #6 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album6.png" alt=""  class="music-playlist-left" />
      <h1>Enrique Iglesias</h1>
      <p>'Tonight'</p>
      <a class="code" href="#006" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="006" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #7 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album7.png" alt=""  class="music-playlist-left" />
      <h1>Rihanna</h1>
      <p>'What's My Name?'</p>
      <a class="code" href="#007" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="007" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #8 >
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album8.png" alt=""  class="music-playlist-left" />
      <h1>Pitbull</h1>
      <p>'Hey Baby!'</p>
      <a class="code" href="#008" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="008" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #9 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album9.png" alt=""  class="music-playlist-left" />
      <h1>Britney Spears</h1>
      <p>'Hold It Against Me'</p>
      <a class="code" href="#009" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="009" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #10 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album10.png" alt=""  class="music-playlist-left" />
      <h1>Far East Movement</h1>
      <p>'Rocketeer'</p>
      <a class="code" href="#010" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="010" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #11 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album11.png" alt=""  class="music-playlist-left" />
      <h1>Black Eyed Peas</h1>
      <p>'The Time'</p>
      <a class="code" href="#011" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="011" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #12 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album12.png" alt=""  class="music-playlist-left" />
      <h1>Amos Lee</h1>
      <p>'Mission Bell'</p>
      <a class="code" href="#012" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="012" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #13 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album13.png" alt=""  class="music-playlist-left" />
      <h1>Wisin & Yandel</h1>
      <p>'Los Vaqueros'</p>
      <a class="code" href="#013" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="013" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #14 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album14.png" alt=""  class="music-playlist-left" />
      <h1>Rihanna</h1>
      <p>'Loud'</p>
      <a class="code" href="#014" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="014" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #15 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album15.png" alt=""  class="music-playlist-left" />
      <h1>R.Kelly</h1>
      <p>'Love Letter'</p>
      <a class="code" href="#015" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="015" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #16 >
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album16.png" alt=""  class="music-playlist-left" />
      <h1>Lil Wayne</h1>
      <p>'Human Being'</p>
      <a class="code" href="#016" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="016" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #17 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album17.png" alt=""  class="music-playlist-left" />
      <h1>Justin Bieber</h1>
      <p>'My World 2.0'</p>
      <a class="code" href="#017" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="017" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #18 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album18.png" alt=""  class="music-playlist-left" />
      <h1>The Band Perry</h1>
      <p>'Listen'</p>
      <a class="code" href="#018" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="018" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #19 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album19.png" alt=""  class="music-playlist-left" />
      <h1>Keyshia Cole</h1>
      <p>'Calling All Hearts'</p>
      <a class="code" href="#019" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="019" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #20 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album20.png" alt=""  class="music-playlist-left" />
      <h1>Keri Hilson</h1>
      <p>'No Boys Allowed'</p>
      <a class="code" href="#020" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="020" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #1 >
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album1.png" alt=""  class="music-playlist-left" />
      <h1>Eminem</h1>
      <p>'Not Afraid'</p>
      <a class="code" href="#021" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="021" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #2 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album2.png" alt=""  class="music-playlist-left" />
      <h1>Bruno Mars</h1>
      <p>'Grenade'</p>
      <a class="code" href="#022" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="022" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #3>
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album3.png" alt=""  class="music-playlist-left" />
      <h1>Pink</h1>
      <p>'F**kin Perfect'</p>
      <a class="code" href="#0021" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0021" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #4 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album4.png" alt=""  class="music-playlist-left" />
      <h1>Katy Perry</h1>
      <p>'Firework'</p>
      <a class="code" href="#0022" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0022" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #5 >
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album5.png" alt=""  class="music-playlist-left" />
      <h1>Wiz Khalifa</h1>
      <p>'Black And Yellow'</p>
      <a class="code" href="#0023" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0023" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #6 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album6.png" alt=""  class="music-playlist-left" />
      <h1>Enrique Iglesias</h1>
      <p>'Tonight'</p>
      <a class="code" href="#0024" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0024" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #7 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album7.png" alt=""  class="music-playlist-left" />
      <h1>Rihanna</h1>
      <p>'What's My Name?'</p>
      <a class="code" href="#0025" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0025" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #8 >
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album8.png" alt=""  class="music-playlist-left" />
      <h1>Pitbull</h1>
      <p>'Hey Baby!'</p>
      <a class="code" href="#0026" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0026" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #9 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album9.png" alt=""  class="music-playlist-left" />
      <h1>Britney Spears</h1>
      <p>'Hold It Against Me'</p>
      <a class="code" href="#0027" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0027" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #10 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album10.png" alt=""  class="music-playlist-left" />
      <h1>Far East Movement</h1>
      <p>'Rocketeer'</p>
      <a class="code" href="#0028" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0028" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #11 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album11.png" alt=""  class="music-playlist-left" />
      <h1>Black Eyed Peas</h1>
      <p>'The Time'</p>
      <a class="code" href="#0029" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="0029" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #12 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album12.png" alt=""  class="music-playlist-left" />
      <h1>Amos Lee</h1>
      <p>'Mission Bell'</p>
      <a class="code" href="#00211" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00211" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #13 >
    <div class="discounted-item rock music-playlist">		
      <img src="image/post/album13.png" alt=""  class="music-playlist-left" />
      <h1>Wisin & Yandel</h1>
      <p>'Los Vaqueros'</p>
      <a class="code" href="#00222" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00222" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #14 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album14.png" alt=""  class="music-playlist-left" />
      <h1>Rihanna</h1>
      <p>'Loud'</p>
      <a class="code" href="#00233" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00233" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #15 >
    <div class="discounted-item rnb music-playlist">		
      <img src="image/post/album15.png" alt=""  class="music-playlist-left" />
      <h1>R.Kelly</h1>
      <p>'Love Letter'</p>
      <a class="code" href="#00244" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00244" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #16 >
    <div class="discounted-item hiphop music-playlist">		
      <img src="image/post/album16.png" alt=""  class="music-playlist-left" />
      <h1>Lil Wayne</h1>
      <p>'Human Being'</p>
      <a class="code" href="#00255" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00255" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #17 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album17.png" alt=""  class="music-playlist-left" />
      <h1>Justin Bieber</h1>
      <p>'My World 2.0'</p>
      <a class="code" href="#00266" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00266" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #18 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album18.png" alt=""  class="music-playlist-left" />
      <h1>The Band Perry</h1>
      <p>'Listen'</p>
      <a class="code" href="#00277" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00277" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #19 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album19.png" alt=""  class="music-playlist-left" />
      <h1>Keyshia Cole</h1>
      <p>'Calling All Hearts'</p>
      <a class="code" href="#00288" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00288" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
	</div>
    
    <!-- #20 >
    <div class="discounted-item pop music-playlist">		
      <img src="image/post/album20.png" alt=""  class="music-playlist-left" />
      <h1>Keri Hilson</h1>
      <p>'No Boys Allowed'</p>
      <a class="code" href="#00299" title="Open MP3 and Listen!"><img src="image/theme/play.png" alt=""  class="music-playlist-right"  /></a>
      <div style="display: none;">
        <div id="00299" style="width:400px;height:110px;overflow:auto;">
          <embed allowscriptaccess="always" height="81" width="400" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F8643855&amp;show_comments=false&amp;auto_play=false&amp;color=070707" type="application/x-shockwave-flash"> <span><a href="#">Blog Artist Song Name</a> by <a href="#">Artist Name</a></span>
         </div>
       </div>	
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