<?php
require_once "lib/db.php";
?>

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

<script src="flowplayer/example/flowplayer-3.2.6.min.js"></script>
<body>
<?php
$sql = mysql_fetch_array(mysql_query("SELECT * FROM _video WHERE idvideo = '".$_GET['id']."'"));
if($sql['choice'] == 1) { 
?>
<a href="<?php echo "admin/uploads/videos/".$sql['localfile']."" ?>" style="display:block;width:540px;height:315px" id="player"> 
		</a> 
<?php } 
else {
echo "
<iframe width='540' height='315' src='".$sql['youtube']."' frameborder='0' allowfullscreen></iframe>";
}
?>
</body>
<script language="JavaScript">
flowplayer("player", "flowplayer/flowplayer-3.2.7.swf");
</script>