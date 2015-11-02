<?php
error_reporting(E_ALL);
require_once "lib/db.php";
?>
<link href="css/app/general2.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style/style.css" type="text/css" />
<link rel="stylesheet" href="css/style/default.css" type="text/css" />
<link rel="stylesheet" href="css/lionbars.css" type="text/css" />
<link rel="icon" href="image/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon">
<!-- styles needed by jScrollPane -->
<link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />

<!-- latest jQuery direct from google's CDN -->
<script type="text/javascript" src="js/jquery.min.js">
</script>

<!-- the mousewheel plugin - optional to provide mousewheel support -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>

<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
			$(function()
			{
				var win = $(window);
				// Full body scroll
				var isResizing = false;
				win.bind(
					'resize',
					function()
					{
						if (!isResizing) {
							isResizing = true;
							var container = $('body');
							// Temporarily make the container tiny so it doesn't influence the
							// calculation of the size of the document
							container.css(
								{
									'width': 1,
									'height': 1
								}
							);
							// Now make it the size of the window...
							container.css(
								{
									'width': win.width(),
									'height': win.height()
								}
							);
							isResizing = false;
							container.jScrollPane(
								{
									'showArrows': true
								}
							);
						}
					}
				).trigger('resize');

				// Workaround for known Opera issue which breaks demo (see
				// http://jscrollpane.kelvinluck.com/known_issues.html#opera-scrollbar )
				$('body').css('overflow', 'hidden');

				// IE calculates the width incorrectly first time round (it
				// doesn't count the space used by the native scrollbar) so
				// we re-trigger if necessary.
				if ($('#full-page-container').width() != win.width()) {
					win.trigger('resize');
				}
			});
		</script>
<body>
<div class="container_amit" id="amit_section">
	<?php
	$sql2 = mysql_fetch_array(mysql_query("SELECT * FROM _bands WHERE active=1 AND idband='".$_GET['id']."'"));
	echo "  
	<div class='amit about'>
    <p style='padding-bottom:6px; font-size:12px;'><strong><a href='#'>Band Name</a></strong></p>
    <p><strong>".$sql2['band_name']."</strong> </p>
	</div>
	";

	$sql = mysql_query("SELECT * FROM _artist WHERE active=1 AND band='".$_GET['id']."'");
	while($r = mysql_fetch_array($sql))
	{
	$sex = ($r['sex'] == 1) ? "user3" : "user1";
	echo "  
	<div class='amit about'>
    <img src='image/post/".$sex.".png' alt=''/>
    <p style='padding-bottom:6px; font-size:12px;'><strong><a href='#'>".$r['name']."</a></strong></p>
    <p><strong>Position</strong> : ".$r['position']."</p>
	</div>
	";
	}
	$sql2 = mysql_fetch_array(mysql_query("SELECT * FROM _bands WHERE active=1 AND idband='".$_GET['id']."'"));
	$sql3 = mysql_fetch_array(mysql_query("SELECT * FROM _genres WHERE active=1 AND idgenre='".$sql2['genre']."'"));
	echo "  
	<div class='amit about'>
    <p style='padding-bottom:6px; font-size:12px;'><strong><a href='#'>Genre</a></strong></p>
    <p><strong>".$sql3['genre_name']."</strong></p>
	</div>
	";
	echo "  
	<div class='amit about'>
    <p style='padding-bottom:6px; font-size:12px;'><strong><a href='#'>Location</a></strong></p>
    <p><strong>".$sql2['location']."</strong> </p>
	</div>
	";
	if($sql2['fb_page'])
	echo "
	<div class='amit about'>
	<p style='padding-bottom:6px; font-size:12px;'><strong><a href='#'>".$sql2['band_name']." on Facebook</a></strong></p>
	<iframe style='padding-left:12px' src='http://www.facebook.com/plugins/like.php?href=".$sql2['fb_page']."'
        scrolling='no' frameborder='0'
        style='border:none; width:450px; height:80px'></iframe></div>
	";
	?>
</div>
</body>