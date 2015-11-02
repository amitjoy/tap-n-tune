<?php
error_reporting(0);
require dirname(__FILE__).'/config.inc.php';


// menu items - will secure request var [ section ] latter
$menuItems = array (
	#The Start Section of Menu
	'TapNTune Section'=>array(
	'tnt_genre'=>'Genre',
	'tnt_bands'=>'Bands',
	'tnt_artist'=>'Artists',
	'tnt_audio'=>'Audio',
	'tnt_video'=>'Video',
	'tnt_message'=>'Messages',
	'tnt_about'=>'About Us Page',
	'tnt_contact'=>'Contact Us Page',
	'tnt_owner'=>'Owners',
	'tnt_social'=>'Social Network'
	),
	/*#This is TapNTune Menu Section
	'ex1_users'=>lang::translate('ex1_users'),
	'ex2_content'=>lang::translate('ex2_static_content'),
	lang::translate('ex3_articles')=> array (
		'ex31_articles_categories'=>lang::translate('ex31_categories'),
		'ex32_articles_content'=>lang::translate('ex32_all_articles'),
	),
	lang::translate('ex4_simple_pool_system')=>array(
		'ex41_poolquestions'=>lang::translate('ex41_questions'),
		'ex42_poolanswers'=>lang::translate('ex42_answers'),
	),
	'ex5_contactform'=>lang::translate('ex5_contact_form'),
	'ex6_photogallery'=>lang::translate('ex6_photo_gallery'),
	*/
	// don't remove this
	lang::translate('men_admin_settings')=>array (
		'_adm_users'=>lang::translate('men_users'),
		'_adm_roles'=>lang::translate('men_roles'),
		# '_adm_privs'=>lang::translate('men_roles_to_privs'),
		'_adm_language'=>lang::translate('men_language'),
	)
);

$_SESSION['menu_items'] = $menuItems;

// send requests and create the instance
$a = new admin( $_SERVER['REQUEST_URI'], isset($_POST) ? $_POST : array(), isset($_FILES) ? $_FILES : array() );

$a->validSections[] = 'ex43_poolposible';

// define your current section
if(!isset($_GET['section'])) {
	$_GET['section'] = 'default';
}

// validate GET from menu array, to make a safe include
if( $a->validateInclude( $_GET['section'] ) && is_file(dirname(__FILE__).'/cont-'.$_GET['section'].'.inc.php') ) {
	require dirname(__FILE__).'/cont-'.$_GET['section'].'.inc.php';
} else {
	die('This is not a valid section! Make sure the file "cont-'.htmlentities($_GET['section']).'.inc.php" exists.');
}


// initialize
$a->build();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo lang::translate('_site_title_') ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<base href="<?php echo BASE_URL ?>" />
	<link rel="stylesheet" type="text/css" href="jscss/css.css" />
	<link rel="stylesheet" type="text/css" href="jscss/jquery_ui.css" />
	<?php /* // you can request jQuery from Google... or NOT
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" media="all" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	*/ ?>
	<script type="text/javascript" src="jscss/jquery_and_ui.js"></script>
	<script type="text/javascript">
		DICT_SEARCH_FILTER_TO = '<?php echo str_replace("'", '"', lang::translate('js_search_filter_to')) ?>';// 'Select field to filter by... &nbsp;';
		DICT_REMOVER_FILTER = '<?php echo str_replace("'", '"', lang::translate('js_remove_filter')) ?>';// 'Remove filter';
		DICT_CHOOSE_A_FILTER = '<?php echo str_replace("'", '"', lang::translate('js_choose_a_filter')) ?>';// 'choose a field';
		DICT_SET_SOME_VALID_FILTERS = '<?php echo str_replace("'", '"', lang::translate('js_set_some_filters')) ?>';// 'Please set some valid filters!';
		DICT_SELECT_RECORDS_TO_DELETE = '<?php echo str_replace("'", '"', lang::translate('js_select_records_to_delete')) ?>';
		DICT_DELETE_SELECTED_RECORDS = '<?php echo str_replace("'", '"', lang::translate('js_delete_selected_recs')) ?>';
	</script>
	<script type="text/javascript" src="jscss/js.js"></script>
</head>

<body>

	<table class="main">
		<?php if($a->navigation) { ?>
		<tr>
			<td colspan="2" class="_header">
				<p id="_langs"><?php echo $a->languageFrontEnd ?></p>
				<h1>
					<?php echo lang::translate('_site_title_') ?>
					<span>
						<?php echo $a->h(isset($_SESSION['USERAUTH']['username'])?$_SESSION['USERAUTH']['username']:'&nbsp;') ?>
						<a href="<?php echo BASE_URL ?>?logout" onclick="return confirm('<?php echo lang::translate('are_you_sure') ?>')"><?php echo lang::translate('logout') ?></a>
					</span>
				</h1>
			</td>
		</tr>
		<?php } ?>
		<tr>
			<?php if($a->navigation) { ?>
				<td class="_menu" valign="top"><?php
					// generate <ul> <li> menu
					echo $a->generateMenu();
				?></td>
			<?php } ?>
			<td class="_content" valign="top"><?php
				// get top buttons
				echo $a->actionButtons;
				if($a->navigation) {
					// get exported files
					if(isset($_SESSION['_exported_excels_']) && !empty($_SESSION['_exported_excels_']) && isset($_GET['section']) && !empty($_GET['section']) && $a->independent == false ) {
						foreach($_SESSION['_exported_excels_'] as $excelFilename){
							$filtersString = '';
							if(isset($excelFilename[2]) && is_array($excelFilename[2]) && !empty($excelFilename[2])) {
								$filtersString .= ' ('.lang::translate('with_filters').': ';
								foreach($excelFilename[2] as $filterField=>$fOptions) {
									$filtersString .= $filterField.', ';
								}
								$filtersString = substr($filtersString, 0, -2) . ')';
							}
							echo '<p style="font-size:11px;padding:2px 5px;background:#fff;margin:0 0 2px 0">- '.lang::translate('download_file').' (<a href="uploads/_excels_/'.$excelFilename[0].'">'.$excelFilename[0].'</a>) '.lang::translate('exported_at').' ' . $excelFilename[1] . $filtersString . '</p>';
						}
						echo '
							<p style="font-size:11px;padding:2px 5px;margin:0 0 2px 0;background:#ddd"><a href="'.$a->url().'clearexcels=1" onclick="return confirm(\''.lang::translate('clear_question').'\')">'.lang::translate('clear_this_listing').'</a> '.lang::translate('csv_files_will_remain_in_').'</p>
							<p style="clear:both;padding:0;margin:0">&nbsp;</p>';
					}
					// create filter DIV
					echo '
						<div id="_filterZone">'.$a->filtersFrontEnd.'</div>
						<p id="_submitFilters">
							<a href="#" id="_applyFilters" onclick="return applyCurrentFilters()">'.lang::translate('apply_filters').'</a>
							<a href="#" id="_applyFilters_fake" onclick="return false">'.lang::translate('wait').'</a>
						</p>
					';
				}
				// some free text before
				echo $a->textBefore;
				// if error, show
				if(!empty($a->error)){
					echo '<p class="_error">'.implode('<br />', $a->error) . '</p>';
				}
				// for (insert or update)
				echo $a->form;
				// listing
				echo $a->listTable;
				// some free text after
				echo $a->textAfter;
				// pages
				echo $a->listPages;
			?></td>
			
		</tr>
	</table>
	
	<?php
	// if we have content fields, show tinyMCE
	if($a->haveFieldType('content') && ( $a->show == 'insert' || $a->show == 'update' ) ) {
		$content_fields = '';
		foreach($a->fields as $field=>$options) {
			if($options['type'] == 'content') {
				$content_fields .= $field.',';
			}
		} $content_fields = substr($content_fields, 0, -1);
		?>
		<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				mode : 'exact', elements : '<?php echo $content_fields ?>', theme : 'advanced',
				plugins : 'save,paste,table,style,advimage,advlink,fullscreen,media,template', /* imagemanager, */ 
				entity_encoding: "raw", relative_urls:false, convert_urls:false, content_css:'jscss/css_editor.css',
				theme_advanced_toolbar_location:"top", theme_advanced_statusbar_location: "bottom", theme_advanced_resizing : true,
				theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,sub,sup,|,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,formatselect,fontselect,fontsizeselect',
				theme_advanced_buttons2 : 'pastetext,pasteword,undo,redo,|,link,image,media,charmap,|,tablecontrols,|,fullscreen,code,styleselect',
				language: "<?php echo isset($_SESSION['LANGUAGE_CURRENT']) ? $_SESSION['LANGUAGE_CURRENT'] : $_SESSION['LANGUAGE_CURRENT']; ?>", theme_advanced_buttons3 : '', theme_advanced_buttons4 : '', external_image_list_url : '' /* you can have a PHP here to get a simple file manager */
			});
		</script>
	<?php } ?>


	<script type="text/javascript">
		var availableFilters = <?php echo $a->generateJSONAvailableFilters() ?>;
		var currentURL = '<?php echo $a->url(false, '&') ?>';
	</script>
	<script type="text/javascript" src="jscss/after.js"></script>
	
</body>

</html>
