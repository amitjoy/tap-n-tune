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
<link rel="icon" href="image/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
<!-- Theme Style -->
<link href="css/app/general2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style/style.css" type="text/css" />
<link rel="stylesheet" href="css/style/default.css" type="text/css" />

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
<script src="js/jquery.cookie.js"></script>
<script src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/general.js"></script>
<script src="js/function.js"></script>
<script type="text/javascript" src="js/filter.js"></script>
<script src="js/styleswitch.js"></script>
<script>
function amit()
{
window.location.href="index.php";
}
</script>
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
<?php
$title = ($_GET['result']=='b') ? "Music and Video Listing" : "Tap-N-Tune Search Page"; 
?>
<title><?=$title;?></title>
<?php
error_reporting(0);
require_once "lib/db.php";
$search = $_GET['search'];
$id = $_GET['id'];
$arr = explode("_",$id);
$sel = $_GET['sel'];
$band = array();
$audio = array();
$video = array();
if($arr[2] >= 15662 && $arr[2]<=34555 && isset($sel))
{
$sql1 = mysql_query("SELECT * FROM _bands WHERE band_name LIKE '%".$search."%' AND active = 1");
$sql2 = mysql_query("SELECT * FROM _audio WHERE title LIKE '%".$search."%' AND active = 1");
$sql3 = mysql_query("SELECT * FROM _video WHERE video_name LIKE '%".$search."%' AND active = 1");
$sql4 = mysql_query("SELECT * FROM _genres WHERE genre_name LIKE '%".$search."%' AND active = 1");
$sql5 = mysql_query("SELECT * FROM _bands WHERE location LIKE '%".$search."%' AND active = 1");
$sql6 = mysql_query("SELECT * FROM _artist WHERE name LIKE '%".$search."%' AND active = 1");
//echo "<div class='container_16' id='amit_section'>";
?>
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
  </div><!-- Mini Button -->
  <div class="grid_2 nav-button">
  	<a href="admin/" title="Admin Login Area" class="buton-login-mini"></a>
    <!--a href="signup.html" id="allpage-signup-top" title="Open Signup Modal Box" class="buton-signup-mini"></a-->
    <a href="search.php" id="allpage-search-top" title="Open Search Area" class="buton-search-mini"></a>
  </div>
  
  <?php
  $txt = ($_GET['result']=="b") ? "Music and Video listing" : "search result listing";
  ?>
  <!-- Big Message -->
  <div class="grid_11 top-message">
    <h1>This is <?=$txt;?>, contrary to popular belief, It has roots</h1>
  </div>
  
  <!-- Emty Grid -->
  <div class="grid_5">
  </div>
  <?php
  function search_type($id)
  {
	$arr = array(1=>"Band Name",2=>"Audio Title",3=>"Video Title",5=>"Artist Name",6=>"Location");
	foreach($arr as $k=>$v)
	{
		if($id == $k){
		$str = $v;  
		}
	}
	return $str;
  }
  $header = ($_GET['result']=='b') ? $_GET['search']."'s Music and Video Listings" : "Just Search | Search Term: ".$_GET['search']." | Search Type: ".search_type($_GET['sel']); 
  ?>
  <div class="grid_16 blog-page">
    <h1><?=$header;?></h1>
    <h2 class="blog-page-space">Emotions and music are colateral in life. One is necessary to get another one.</h2>
  </div>
  
  <div class="grid_16 list-page">
  
  <!-- Filter-->
    <!--ul class="splitter">
      <li>
        <ul>
		<li><a href="#" id="allcat" class="middle-button" ><span class="middle-right"></span>All </a></li>
		<?php
		$sql = mysql_query("SELECT * FROM _genres WHERE active = 1");
		while($r = mysql_fetch_array($sql))
		{
		echo "<a href='#' id='".$r['genre_name']."' class='filter middle-button' ><span class='middle-right'></span>".$r['genre_name']." </a></li>";
		}
		?>
		<!--
          <li><a href="#" id="allcat" class="middle-button" ><span class="middle-right"></span>All </a></li>
          <li><a href="#" id="music" class="filter middle-button" ><span class="middle-right"></span>Music </a></li>
          <li><a href="#" id="movie" class="filter middle-button" ><span class="middle-right"></span>Movie </a></li>
          <li><a href="#" id="show" class="filter middle-button" ><span class="middle-right"></span>Show </a></li>
          <li><a href="#" id="concert" class="filter middle-button" ><span class="middle-right"></span>Concert </a></li>
        
		</ul>
      </li>
    </ul-->   
    <div style="clear:both"></div>
    
    <div id="listing">
<?php
//print_r($_COOKIE);
switch($sel)
{
case 1:
	if(mysql_num_rows($sql1)>0)
	{
		while($r = mysql_fetch_array($sql1))
		{
			$sql12 = mysql_query("SELECT * FROM _video WHERE band = ".$r['idband']." AND active = 1");
			$sql13 = mysql_query("SELECT * FROM _audio WHERE band = ".$r['idband']." AND active = 1");
			$sql14 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE genre_name = ".$r['genre']." AND active = 1"));
			while($rr = mysql_fetch_array($sql12))
			{
	$choice = ($rr['choice']==1) ? "admin/uploads/videos/".$rr['localfile'] : $rr['youtube'];
	echo "
	 <div class='discounted-item ".$sql14['genre_name']." video-playlist'>		
     <a class='picture' title='".$r['band_name']."' href='admin/uploads/gallery/190x160/".$rr['video_pic']."'>  
	 <img src='admin/uploads/gallery/190x160/".$rr['video_pic']."' alt='' class='video-playlist-left'>
		</a>
	 <h1>".$rr['video_name']."</h1>
      <p>".$rr['caption']."</p>
     <a class='iframe' href='video_page.php?id=".$rr['idvideo']."' title='Play Video' ><img src='image/theme/play.png' alt='' class='video-playlist-right'></a>
	</div> 
	";
		}
		while($rr = mysql_fetch_array($sql13))
			{
				$sql112 = mysql_fetch_array(mysql_query("SELECT * FROM _bands WHERE idband = ".$rr['band']." AND active = 1"));
	$sql113 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql112['genre']." AND active = 1"));
	$sql114 = mysql_fetch_array(mysql_query("SELECT * FROM _artist WHERE idartist = ".$rr['artist']." AND active = 1"));
	$sql115 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql114['genre']." AND active = 1"));
	$genre = isset($sql113['genre_name']) ? $sql113['genre_name'] : $sql115['genre_name'];
	$band = $sql112['band_name'] ? "Band: ".$sql112['band_name'] : $sql114['name'];
			$func = "like(".$rr['idaudio'].");";
	$count = $rr['likes'] ? "(".$rr['likes'].")" : "";
	$button = ($_COOKIE['tnt_'.$rr['idaudio']]=="yes") ? "Liked ".$count : "Like ".$count;
	$link = ($_COOKIE['tnt_'.$rr['idaudio']]=="yes") ? "#" : $func;
	echo "
	 <div class='discounted-item ".$genre." music-playlist'>		
	 <a class='picture' title='".$band."' href='admin/uploads/gallery/38x38/".$rr['audio_pic']."'>  
      <img src='admin/uploads/gallery/38x38/".$rr['audio_pic']."' alt='' class='music-playlist-left'  />
	  </a>
      <h1>".$rr['title']."</h1>
      <p>".$rr['caption']."</p>
      <a class='code' href='#00".++$i."' title='Listen!'><img src='image/theme/play.png' alt='' class='music-playlist-right'  /></a>
      <div style='display: none;'>
        <div id='00".$i."' style='width:410px;height:150px;overflow:auto;'>
		<embed type='application/x-shockwave-flash' src='amit_player/amit-player.swf' flashvars='audioUrl=admin/uploads/audios/".$rr['localfile']."' width='400' height='20' quality='best'></embed>
		 <br/><div align='center'>Playing ".$rr['title']."</div>
		 <div align='center'><input type='button' id='likes' onclick='".$link."' class='amit_button tnt_".$rr['idaudio']."' value='".$button."'></div>
         </div>
       </div>	
	</div>
	";
		}
	}
	}
	else
	echo "No results found";
	break;
case 2:
	if(mysql_num_rows($sql2)>0)
	{
		while($r = mysql_fetch_array($sql2))
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
        <div id='00".$i."' style='width:410px;height:150px;overflow:auto;'>
		<embed type='application/x-shockwave-flash' src='amit_player/amit-player.swf' flashvars='audioUrl=admin/uploads/audios/".$r['localfile']."' width='400' height='20' quality='best'></embed>
		 <br/><div align='center'>Playing ".$r['title']."</div>
		 <div align='center'><input type='button' id='likes' onclick='".$link."' class='amit_button tnt_".$r['idaudio']."' value='".$button."'></div>
         </div>
       </div>	
	</div>
	";
		}
	}
	else
	echo "No results found";
	break;
case 3:
	if(mysql_num_rows($sql3)>0)
	{
		while($r = mysql_fetch_array($sql3))
		{
		$sql12 = mysql_fetch_array(mysql_query("SELECT * FROM _bands WHERE idband = ".$r['band']." AND active = 1"));
	$sql13 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql2['genre']." AND active = 1"));
	$sql14 = mysql_fetch_array(mysql_query("SELECT * FROM _artist WHERE idartist = ".$r['artist']." AND active = 1"));
	$sql15 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql4['genre']." AND active = 1"));
	$choice = ($r['choice']==1) ? "admin/uploads/videos/".$r['localfile'] : $r['youtube'];
	$genre = isset($sql13['genre_name']) ? $sql13['genre_name'] : $sql15['genre_name'];
	$band = $sql12['band_name'] ? "Band: ".$sql12['band_name'] : $sql14['name'];
	echo "
	 <div class='discounted-item ".$genre." video-playlist'>		
     <a class='picture' title='".$band."' href='admin/uploads/gallery/190x160/".$r['video_pic']."'>  
	 <img src='admin/uploads/gallery/190x160/".$r['video_pic']."' alt='' class='video-playlist-left'>
		</a>
	 <h1>".$r['video_name']."</h1>
      <p>".$r['caption']."</p>
     <a class='iframe' href='video_page.php?id=".$r['idvideo']."' title='Play Video' ><img src='image/theme/play.png' alt='' class='video-playlist-right'></a>
	</div> 
	";
		}
	}
	else
	echo "No results found";
	break;
case 4:
	if(mysql_num_rows($sql4)>0)
	{
		while($r = mysql_fetch_array($sql4))
		{
			$sql =mysql_query("SELECT * FROM _bands WHERE genre='".$r['idgenre']."' AND active=1");
			while($rr = mysql_fetch_array($sql))
			{
			echo "
		<div class='discounted-item ".$rr['genre_name']." photo-playlist'>		
		<a id='iframe' href='band_detail.php?id=".$rr['idband']."' title='".$rr['location']."'><img src='admin/uploads/gallery/190x300/".$rr['poster']."' alt='' class='photo-playlist-left'></a>
		<h1>".$rr['band_name']."</h1>
		</div>
			";
			}
		}
	}
	else
	echo "No results found";
	break;
case 5:
	if(mysql_num_rows($sql6)>0)
	{
		while($r = mysql_fetch_array($sql6))
		{
			$sql12 = mysql_query("SELECT * FROM _video WHERE artist = ".$r['idartist']." AND active = 1");
			$sql13 = mysql_query("SELECT * FROM _audio WHERE artist = ".$r['idartist']." AND active = 1");
			$sql14 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$r['genre']." AND active = 1"));
			$artist = $r['name'];
			while($rr = mysql_fetch_array($sql12))
			{
	$choice = ($rr['choice']==1) ? "admin/uploads/videos/".$rr['localfile'] : $rr['youtube'];
	echo "
	 <div class='discounted-item ".$sql14['genre_name']." video-playlist'>		
     <a class='picture' title='".$artist."' href='admin/uploads/gallery/190x160/".$rr['video_pic']."'>  
	 <img src='admin/uploads/gallery/190x160/".$rr['video_pic']."' alt='' class='video-playlist-left'>
		</a>
	 <h1>".$rr['video_name']."</h1>
      <p>".$rr['caption']."</p>
       <a class='iframe' href='video_page.php?id=".$rr['idvideo']."' title='Play Video' ><img src='image/theme/play.png' alt='' class='video-playlist-right'></a>
	</div> 
	";
		}
		while($rr = mysql_fetch_array($sql13))
			{
			$sql112 = mysql_fetch_array(mysql_query("SELECT * FROM _bands WHERE idband = ".$rr['band']." AND active = 1"));
	$sql113 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql112['genre']." AND active = 1"));
	$sql114 = mysql_fetch_array(mysql_query("SELECT * FROM _artist WHERE idartist = ".$rr['artist']." AND active = 1"));
	$sql115 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql114['genre']." AND active = 1"));
	$genre = isset($sql113['genre_name']) ? $sql113['genre_name'] : $sql115['genre_name'];
	$band = $sql112['band_name'] ? "Band: ".$sql112['band_name'] : $sql114['name'];
			$func = "like(".$rr['idaudio'].");";
	$count = $rr['likes'] ? "(".$rr['likes'].")" : "";
	$button = ($_COOKIE['tnt_'.$rr['idaudio']]=="yes") ? "Liked ".$count : "Like ".$count;
	$link = ($_COOKIE['tnt_'.$rr['idaudio']]=="yes") ? "#" : $func;
	echo "
	 <div class='discounted-item ".$genre." music-playlist'>		
	 <a class='picture' title='".$band."' href='admin/uploads/gallery/38x38/".$rr['audio_pic']."'>  
      <img src='admin/uploads/gallery/38x38/".$rr['audio_pic']."' alt='' class='music-playlist-left'  />
	  </a>
      <h1>".$rr['title']."</h1>
      <p>".$rr['caption']."</p>
      <a class='code' href='#00".++$i."' title='Listen!'><img src='image/theme/play.png' alt='' class='music-playlist-right'  /></a>
      <div style='display: none;'>
        <div id='00".$i."' style='width:410px;height:150px;overflow:auto;'>
		<embed type='application/x-shockwave-flash' src='amit_player/amit-player.swf' flashvars='audioUrl=admin/uploads/audios/".$rr['localfile']."' width='400' height='20' quality='best'></embed>
		 <br/><div align='center'>Playing ".$rr['title']."</div>
		 <div align='center'><input type='button' id='likes' onclick='".$link."' class='amit_button tnt_".$rr['idaudio']."' value='".$button."'></div>
         </div>
       </div>	
	</div>";
		}
	}
	}
	else
	echo "No results found";
	break;
case 6:
	if(mysql_num_rows($sql5)>0)
	{
		while($r = mysql_fetch_array($sql5))
		{
			$sql12 = mysql_query("SELECT * FROM _video WHERE band = ".$r['idband']." AND active = 1");
			$sql13 = mysql_query("SELECT * FROM _audio WHERE band = ".$r['idband']." AND active = 1");
			$sql14 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE genre_name = ".$r['genre']." AND active = 1"));
			while($rr = mysql_fetch_array($sql12))
			{
	$choice = ($rr['choice']==1) ? "admin/uploads/videos/".$rr['localfile'] : $rr['youtube'];
	echo "
	 <div class='discounted-item ".$sql14['genre_name']." video-playlist'>		
     <a class='picture' title='".$r['band_name']."' href='admin/uploads/gallery/190x160/".$rr['video_pic']."'>  
	 <img src='admin/uploads/gallery/190x160/".$rr['video_pic']."' alt='' class='video-playlist-left'>
		</a>
	 <h1>".$rr['video_name']."</h1>
      <p>".$rr['caption']."</p>
     <a class='iframe' href='video_page.php?id=".$rr['idvideo']."' title='Play Video' ><img src='image/theme/play.png' alt='' class='video-playlist-right'></a>
	</div> 
	";
		}
		while($rr = mysql_fetch_array($sql13))
			{
				$sql112 = mysql_fetch_array(mysql_query("SELECT * FROM _bands WHERE idband = ".$rr['band']." AND active = 1"));
	$sql113 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql112['genre']." AND active = 1"));
	$sql114 = mysql_fetch_array(mysql_query("SELECT * FROM _artist WHERE idartist = ".$rr['artist']." AND active = 1"));
	$sql115 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE idgenre = ".$sql114['genre']." AND active = 1"));
	$genre = isset($sql113['genre_name']) ? $sql113['genre_name'] : $sql115['genre_name'];
	$band = $sql112['band_name'] ? "Band: ".$sql112['band_name'] : $sql114['name'];
			$func = "like(".$rr['idaudio'].");";
	$count = $rr['likes'] ? "(".$rr['likes'].")" : "";
	$button = ($_COOKIE['tnt_'.$rr['idaudio']]=="yes") ? "Liked ".$count : "Like ".$count;
	$link = ($_COOKIE['tnt_'.$rr['idaudio']]=="yes") ? "#" : $func;
	echo "
	 <div class='discounted-item ".$genre." music-playlist'>		
	 <a class='picture' title='".$band."' href='admin/uploads/gallery/38x38/".$rr['audio_pic']."'>  
      <img src='admin/uploads/gallery/38x38/".$rr['audio_pic']."' alt='' class='music-playlist-left'  />
	  </a>
      <h1>".$rr['title']."</h1>
      <p>".$rr['caption']."</p>
      <a class='code' href='#00".++$i."' title='Listen!'><img src='image/theme/play.png' alt='' class='music-playlist-right'  /></a>
      <div style='display: none;'>
        <div id='00".$i."' style='width:410px;height:150px;overflow:auto;'>
		<embed type='application/x-shockwave-flash' src='amit_player/amit-player.swf' flashvars='audioUrl=admin/uploads/audios/".$rr['localfile']."' width='400' height='20' quality='best'></embed>
		 <br/><div align='center'>Playing ".$rr['title']."</div>
		 <div align='center'><input type='button' id='likes' onclick='".$link."' class='amit_button tnt_".$rr['idaudio']."' value='".$button."'></div>
         </div>
       </div>	
	</div>
	";
		}
	}
	}
	else
	echo "No results found";
	break;
	}
}
echo "</div>";
?>
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