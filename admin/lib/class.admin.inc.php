<?php
error_reporting(0);
class admin {

	// current directory
	protected $baseURL = BASE_URL;
	
	// database settings
	
	# table
	public $table = '';
	
	# primary key column
	public $primaryKey = '';
	
	# order array
	public $order = array();
	
	# filter array
	public $filter = array();
	
	# no. of records per page
	public $showRecords = 20;
	
	# chars limit on listing
	public $charsLimit = 70;
	
	# some default values for layout
	public $defaultValues = array(
		'fieldWidth'=>'150',
		'fieldHeight'=>'90',
		'formLeftWidth'=>'120',
		'smallThumbsHeight'=>'25',
	);
	
	# maximum upload size (2M)
	public $maximulFileSize = 2048;
	
	# after action - default, list, update, insert
	public $gotoAfterAction = false;
	
	# toggle independent admin (no features)
	public $independent = false;
	
	# add CSV head table
	public $addCSVHead = true;
	
	# if a foreign key is exported, the CSV file will contain
	# the visual string associated, not the ID
	public $exportCSVString = true;
	
	# where to put CSV files after export
	public $exportFolder = 'uploads/';
	
	# other valid sections
	public $validSections = array();
	
	# have navigation elements
	public $navigation = true;
	
	# buttons to hide, no matter what
	public $buttonsToHide = array();
	
	# list of fields - with parameters
	public $fields = array();

	# output vars
	public $actionButtons = '';
	public $form = '';
	public $listTable = '';
	public $listPages = '';
	public $error = '';
	public $filtersFrontEnd = '';
	public $languageFrontEnd = '';
	
	public $textAfter = '';
	public $textBefore = '';
	
	// internal used vars
	protected $section = '';
	protected $URL = '';
	protected $record = array();
	protected $show = '';
	protected $edit = 0;
	protected $page = 1;
	protected $menu = array();
	protected $DB = null;
	protected $USER = null;
	
	// global vars
	protected $POST = array();
	protected $FILES = array();
	
	// current folder
	protected $folder = '';
	
	// filter from URL
	protected $urlFilter = '';
	
	# filter the field - for errors
	// add texts in the build method to translate
	protected $filterString = array();

	
	// get current URL actions
	public function __construct($URL, $post=array(), $files=array()) {

		// URL parse
		$urlparts = parse_url($URL);
		if(!isset($urlparts['query'])) {
			$urlparts['query'] = 'show=list'; # required
		}
		
		// create URL
		$finalURL = explode('&', $urlparts['query']);
		$URL_parts = array (
			'edit'=>0,
			'page'=>1,
			'section'=>'',
			'show'=>'list',
			'filter'=>array(),
			'order'=>array(),
		);

		// assign some internal vars
		$this->menu = $_SESSION['menu_items'];
		$this->folder = dirname(__FILE__).'/../';
		$this->POST = $post;
		$this->FILES = $files;
		
		// get database connection
		$this->DB = new db;
		
		// get user object
		$this->USER = new user($this->POST);

		// GET actions - page, show, edit and others
		foreach($finalURL as $valURL) {
			$u = explode('=', $valURL);
			if(!empty($u[0])) {
				$URL_parts[$u[0]] = $u[1];
				switch($u[0]) {
					case 'edit':
						$this->edit = $u[1];
						break;
					case 'page':
						$this->page = (int)$u[1];
						break;
					case 'section':
						$this->section = $u[1];
						break;
					case 'show':
						if(in_array($u[1], array( 'list', 'insert', 'update', 'delete', 'deletefile', 'export' ))) {
							$this->show = $u[1];
						} else {
							$this->show = 'list';
						}
						break;
					case 'filter':
						$this->urlFilter = unserialize(urldecode($u[1]));
						break;
					case 'order':
						$this->urlOrder = unserialize(urldecode($u[1]));
						break;
					case 'logout':
						$this->USER->logout();
						break;
				}
			}
		}
		
		$this->USER->section = $this->section;
		
		// we have to show something
		if(empty($this->show) && !isset($_GET['lang'])) {
			die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
			No display request - "$this->show" was not set!');
		}
		
		// reset page and edit if we have insert
		if($this->show == 'insert') {
			$this->edit = 0;
		}
		
		// reset page but require update to some ID
		if( $this->show == 'update' || $this->show == 'delete') {
			if(!$this->edit) {
				die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
				Nothing to '.$this->show.'! Set the EDIT request.');
			}
		}
		
		// get URL parts from GET with default values
		$this->URL = $URL_parts;

		// INSERT log if we DON't have a listing OR we have update and POST (something is updated)
		if( ( $this->show != 'list' && $this->show != 'update' ) || ( $this->show == 'update' && !empty($this->POST) )) {
			$validFiles = array();
			if(!empty($this->FILES)) {
				foreach($this->FILES as $kFILES=>$vFILES) {
					if(trim($vFILES['name']) != '') {
						$validFiles[$kFILES] = $vFILES;
					}
				}
			}
			
			$this->DB->fetch('
				INSERT INTO `_adminlog`
				(`request_get`, `request_post`, `request_files`, `user`) VALUES
				( :request_get, :request_post, :request_files, :user )
			', array(
				':request_get'=>isset($_GET) && !empty($_GET) ? serialize($_GET) : '',
				':request_post'=>!empty($this->POST) ? serialize($this->POST) : '',
				':request_files'=>!empty($validFiles) ? serialize($validFiles) : '',
				':user'=>$this->USER->userData['idadmin']
			), 1 );
		}
		
		
		// ======================================================================
		// check USER privileges
		// ======================================================================
		// if not INDEX
		if($this->section != false) {
			// check if the user has the priviledge to access this section
			if(false == $this->USER->can()) {
				die('<p style="font:16px Arial,Verdana;color:#c00">'.lang::translate('access_denied_section').'</p>
				<meta http-equiv="refresh" content="2;url='.BASE_URL.'" />');
			}
			// check if the user can make current action
			if(false == $this->USER->can($this->show) && $this->show != 'export') {
				die('<p style="font:16px Arial,Verdana;color:#c00">'.lang::translate('access_denied_action').'</p>
				<meta http-equiv="refresh" content="2;url='.BASE_URL.'" />');
			}
			// check uploadfile
			if(false == $this->USER->can('uploadfile') && !empty($this->FILES)) {
				die('<p style="font:16px Arial,Verdana;color:#c00">'.lang::translate('access_denied_action').'</p>
				<meta http-equiv="refresh" content="2;url='.BASE_URL.'" />');
			}
		}
		// ======================================================================
		
		// set language links
		$this->languageFrontEnd = lang::createButtons();
		
	}


	public function build($post=array()) {
		
		// add array with filter strings
		$this->filterString = array(
			'alphanum'=>lang::translate('alpha_numerical'), //'alpha numerical',
			'digits'=>lang::translate('digits'), //'digits',
			'number'=>lang::translate('number'), //'number',
			'date'=>lang::translate('date'), //'date',
			'mail'=>lang::translate('email'), //'e-mail',
			'username'=>lang::translate('username_alphanumerical_and_'), //'username ( alphanumerical, _ and - )',
			# for files
			'image'=>lang::translate('image'), //'image',
			'document'=>lang::translate('document'), //'document',
			'archive'=>lang::translate('archive'), //'archive',
			'video'=>lang::translate('video'), //'video',
		);
		
		// if independent mode, do nothing
		if($this->independent) {
			return false;
		}
		
		// be sure you have fields
		if(empty($this->fields)) {
			die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
			Set some fields!');
		}
		
		if($this->checkFields() !== true) {
			die($this->checkFields());
		}
		
		// need primary key
		if($this->primaryKey == '') {
			die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
			No primary key defined!' && $this->section != 'default');
		}
		
		// prepare the filter 
		if(!empty($this->urlFilter)) {
			$this->urlFilter = $this->validateFilterURL();
			$this->filter = array_merge($this->filter, (array)$this->urlFilter);
		}
		$this->URL['filter'] = $this->filter;

		// prepare the order URL
		if(!empty($this->urlOrder) && is_array($this->urlOrder)) {
			$this->urlOrder = $this->validateOrderURL();
			// if the URL order is a valid one, replace
			if(!empty($this->urlOrder)) {
				$this->order = $this->urlOrder;
			}
		}
		$this->URL['order'] = $this->order;
		
		// add values to $this->record
		if($this->edit != 0 && in_array($this->show, array('update', 'delete') ) ) {
			$sql = '
				SELECT `' . implode ( '`, `', $this->getDatabaseFields() ) . '`
				FROM `'.$this->table.'` WHERE `'.$this->primaryKey.'` = :edit '
			;
			$this->record = $this->DB->fetch($sql, array(':edit'=>$this->edit), true);
			# $this->debug($this->record, 1, 1);
		}

		// choose to take actions
		if(isset($this->POST['actionFormSubmited'])) {
			if($this->haveFieldType('file')) {
				require $this->folder.'lib/phpthumb/phpthumb.class.php';
			}
			$this->makeAction();
		}
		
		// clean excel list [download links]
		if(isset($_GET['clearexcels']) && $_GET['clearexcels'] == 1) {
			unset($_SESSION['_exported_excels_']);
			header('Location: '.$this->url(array('clearexcels'=>0), '&'));
			exit;
		}
		
		// set method to execute
		switch($this->show) {
			case 'list':
				$this->addActionButtons(array('insert', 'home', 'filter', 'export', 'multidelete'));
				$this->renderList();
				break;
			case 'insert':
				$this->addActionButtons(array('list', 'home'));
				$this->renderInsert();
				break;
			case 'update':
				$this->addActionButtons(array('list', 'delete', 'home', 'insert'));
				$this->renderUpdate();
				break;
			case 'delete':
				$this->makeDelete();
				break;
			case 'deletefile':
				$this->makeDeleteFile();
				break;
			case 'export':
				$this->renderList(true);
				break;
		}
		
		// make AJAX filter on request
		if(isset($this->POST['makeFilter'])) {
			$finalFilters = array();
			foreach($_POST as $kPost=>$vPost) {
				if(strpos($vPost, '|') !== false) {
					$partsPost = explode('|', $vPost);
					$finalFilters[$kPost] = array( $partsPost[1], $partsPost[0] == '*' ? 'LIKE' : $partsPost[0] );
				}
			}
			// if not a valid filter
			if(empty($finalFilters)) {
				die('');
			} // if all OK, send the request [we have some default values]
			$finalFilters = array_merge($this->filter, $finalFilters);
			die($this->url(array('page'=>1, 'show'=>'list', 'edit'=>'0', 'filter'=>serialize($finalFilters) ), '&'));
		}
		
		// filters to show in page
		$this->filtersFrontEnd = $this->getCurrentfiltersFrontEnd();
		
	}
	
	
	protected function makeDelete() {
		// check if we what to delete
		if(empty($this->edit)) {
			die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
			Nothing to delete!');
		}
		// if multiple deletes
		if(strpos($this->edit, '|') !== false) {
			$toDelete = explode('|', $this->edit);
		} else {
			$toDelete = array($this->edit);
		}
		// unset empty values
		foreach($toDelete as $kToDelete=>$vToDelete) {
			if(trim($vToDelete) == '') {
				unset($toDelete[$kToDelete]);
			}
		}
		foreach($toDelete as $IDTODELETE) {
			// search files into $this->fields
			foreach($this->fields as $field=>$options) {
				if($options['type'] == 'file') {
					// delete files
					if(!isset($options['file']['for']) || $options['file']['for'] == false) {
						// one file delete
						$this->edit = serialize( array( $options['file'], $field, $IDTODELETE ) );
						$this->makeDeleteFile(false);
					} else {
						// get assoc files
						$getAllFiles_res = $this->DB->fetch('
							SELECT `idfile` FROM `_adminfiles`
							WHERE `for_type`= :for
								AND `for_id`= :id
						', array(
							':for'=>$options['file']['for'],
							':id'=>$IDTODELETE
						) );
						// multiple files delete
						if(!empty($getAllFiles_res))
						foreach($getAllFiles_res as $getAllFiles_rec) {
							$this->edit = serialize( array( $options['file'], $getAllFiles_rec['idfile'], $IDTODELETE ) );
							$this->makeDeleteFile(false);
						}
					}
				}
			}

			$this->DB->fetch('
				DELETE
				FROM `'.$this->table.'`
				WHERE `'.$this->primaryKey.'` = :primKey
			', array(':primKey'=>$IDTODELETE));
		}
		header( 'Location: '.$this->url(array('show'=>'list', 'edit'=>0), '&') );
		exit;
	}
	
	
	protected function makeDeleteFile($redirect = true) {
		$fileToDelete = false;
		$this->edit = unserialize(urldecode($this->edit));
		# $this->debug($this->edit);
		// delete from _adminfiles table
		if(isset($this->edit[0]['for']) && $this->edit[0]['for'] != false) {
			$getFile = $this->DB->fetch('SELECT `filepath` FROM `_adminfiles` WHERE `idfile` = :id ', array(':id'=>$this->edit[1]), true);
			if(!empty($getFile)) {
				$fileToDelete = $getFile['filepath'];
			}
			// make delete
			$this->DB->fetch('
				DELETE FROM `_adminfiles` WHERE `idfile` = :edit
			', array(':edit'=>$this->edit[1]) );

		// delete from field and update field to empty string
		} else {
			$rec = $this->DB->fetch('
				SELECT * FROM `'.$this->table.'`
				WHERE `'.$this->primaryKey.'` = :key
			', array(
				':key'=>$this->edit[2]
			), true);
			// update the file as empty
			if(isset($rec[$this->edit[1]])) {
				$this->DB->fetch('
					UPDATE `'.$this->table.'`
					SET `'.$this->edit[1].'`=""
					WHERE `'.$this->primaryKey.'` = :key
				', array(
					':key'=>$this->edit[2]
				), true );
				$fileToDelete = $rec[$this->edit[1]];
			}
		}
		// add '/' to location
		if(substr($this->edit[0]['location'], -1) != '/') {
			$this->edit[0]['location'] .= '/';
		}
		// delete each size
		if(false !== $fileToDelete) {
			if(isset($this->edit[0]['resize']))
			foreach($this->edit[0]['resize'] as $size=>$typeOfRes) {
				# echo $this->folder . $this->edit[0]['location'] . $size . '/' . $fileToDelete.'<br />';
				@unlink($this->folder . $this->edit[0]['location'] . $size . '/' . $fileToDelete);
			}
			# echo $this->folder . $this->edit[0]['location'] . $fileToDelete.'<br />';
			@unlink($this->folder . $this->edit[0]['location'] . $fileToDelete);
		}
		if(!$redirect) {
			return true;
		}
		// go back to update page
		header( 'Location: '.$this->url(array('show'=>'update', 'edit'=>$this->edit[2]), '&') );
		exit;
	}
	
	
	protected function makeAction() {

		foreach($this->fields as $field=>$options) {
			
			// if readonly and EDIT, do nothing
			if(isset($options['readonly']) && $options['readonly'] && $this->show == 'update') {
				continue;
			}
			// validate filter - validates also a "required" filter
			if( false === $this->validateFilter($field, $options) ) {
				$filterToCheck = isset($options['filter']) ? $options['filter'] : '';
				$this->error[] = sprintf(lang::translate('the_x_field_is_not_'), $this->title(isset($options['label'])?$options['label']:$field), isset($this->filterString[$filterToCheck]) ? $this->filterString[$filterToCheck] : lang::translate('completed') );
			}
			// check if the field is required
			$isFieldRequired = isset($options['required']) && $options['required'] && isset($this->POST[$field]) && $this->POST[$field] != '';
			// check min size
			if( $isFieldRequired && isset($options['minSize']) && strlen($this->POST[$field])<$options['minSize'] ) {
				$this->error[] = sprintf(lang::translate('the_x_field_is_smaller_'), $this->title(isset($options['label'])?$options['label']:$field), $options['minSize']);
			}
			// check max size
			if( $isFieldRequired && isset($options['maxSize']) && strlen($this->POST[$field])>$options['maxSize'] ) {
				$this->error[] = sprintf(lang::translate('the_x_field_is_bigger_'), $this->title(isset($options['label'])?$options['label']:$field), $options['maxSize']);
			}
			// check duplicates - only for non-files fields
			if( isset($options['noduplicates']) && $options['noduplicates'] && $options['type'] != 'file' ) {
				$prepareArray = array( ':theField'=>$this->POST[$field] );
				$whereAfter = '';
				if($this->show == 'update') {
					$whereAfter = ' AND `'.$this->primaryKey.'` <> :primKey ';
					$prepareArray[':primKey'] = $this->edit;
				}
				$getRecord_rec = $this->DB->fetch('
					SELECT COUNT(`'.$this->primaryKey.'`) nr
					FROM `'.$this->table.'`
					WHERE `'.$field.'`= :theField '.$whereAfter
				, $prepareArray, true);
				if($getRecord_rec['nr'] > 0) {
					$this->error[] = sprintf(lang::translate('the_x_field_cannot_be_duplicate'), $this->title(isset($options['label'])?$options['label']:$field));
				}
			}

			// stop if errors
			if(!empty($this->error)) {
				return false;
			}
			
			// unset $fileURL to avoid rewriting it
			if(isset($fileURL)) {
				unset($fileURL);
			}
			
			// check if is field - or file as field ( with [file][for] == false )
			if( $this->isField($field) ) {
				$fieldKey = ':f'.md5($field);
				// database values
				switch($options['type']) {
					case 'file':
						$fileURL = $this->makeUploadFile($field.'_1', $options);
						if($fileURL != false) {
							$_values[] = $fieldKey;
							$prepareArrayActionSQL[$fieldKey] = $fileURL;
						}
						break;
					case 'checkbox':
						$_values[] = $fieldKey;
						$prepareArrayActionSQL[$fieldKey] = (int)isset($this->POST[$field]);
						break;
					default:
						if( ( !isset($this->record[$field]) || $this->record[$field] != $this->POST[$field] ) && isset($options['encrypt']) && $options['encrypt']) {
							$_values[] = $fieldKey;
							$prepareArrayActionSQL[$fieldKey] = user::encrypt($this->POST[$field]);
						} else {
							$_values[] = $fieldKey;
							$prepareArrayActionSQL[$fieldKey] = $this->POST[$field];
						}
						break;
				}
				// the field
				if(!isset($fileURL) || $fileURL != false) {
					$_fields[] = $field;
				}
			}
			
			// stop if errors
			if(!empty($this->error)) {
				return false;
			}

			// if more files => INSERT to `_adminfiles` MySql table
			if($options['type'] == 'file' && isset($options['file']['for']) && $options['file']['for'] != false) {
				$multipleFiles = isset($options['file']['multiple']) ? (int)$options['file']['multiple'] : 1;
				if($multipleFiles == 1) {
					$options['file']['order'] = false;
				}
				// INSERT each file
				for($iFiles = 1; $iFiles<=$multipleFiles; $iFiles++) {
					$fileKey = $field.'_'.$iFiles;
					$fileName = $this->makeUploadFile($fileKey, $options);
					if($fileName !== false) {
						$sqlUploadFiles[] = 'INSERT INTO `_adminfiles`
							( `filename`, `filepath`, `filesize`, `for_type`, `for_id`, `order` ) VALUES
							( :filename, :filepath, :filesize, :for_type, :for_id, :order )
						';
						$prepareUploadedArray[] = array(
							':filename'=>$this->FILES[$fileKey]['name'],
							':filepath'=>$fileName,
							':filesize'=>filesize($this->FILES[$fileKey]['tmp_name']),
							':for_type'=>$options['file']['for'],
							':for_id'=>false,
							':order'=>isset($this->POST[$fileKey.'_order']) ? $this->POST[$fileKey.'_order'] : 0
						);
					}
				}
			}
		}
		
		// make INSERT or UPDATE - if no errors
		if(empty($this->error)) {
			
			if($this->show == 'insert') {
				$sql = 'INSERT INTO `'.$this->table.'`
					( `'.implode('`, `', $_fields).'` ) VALUES
					( '.implode(', ', $_values).' )
				';

			} else {
				$sql = 'UPDATE `'.$this->table.'` SET ';
				// if no fields, show an empty error (nothing was submited)
				if(!isset($_fields) || empty($_fields)) {
					$this->error[] = '';
					return false;
				}
				// foreach all fields
				foreach($_fields as $keyFV=>$fVal) {
					$haveFields = 1;
					$sql .= ' `'.$fVal.'` = '.$_values[$keyFV].', ';
				}
				$sql = substr($sql, 0, -2) . ' WHERE `'.$this->primaryKey.'`= :primKeyUpdate ';
				$prepareArrayActionSQL[':primKeyUpdate'] = $this->edit;
			}
			
			// run SQL
			$idRecord = $this->DB->fetch($sql, $prepareArrayActionSQL, true);
			
			// keep ID of the current record
			if($this->show != 'insert') {
				$idRecord = $this->edit;
			}
			
			// insert uploaded files to database
			if(isset($sqlUploadFiles)) {
				foreach($sqlUploadFiles as $keyFileToInsert=>$sqlFile) {
					// add current ID to the statement
					$prepareUploadedArray[$keyFileToInsert][':for_id'] = $idRecord;
					// make fetch
					$this->DB->fetch($sqlFile, $prepareUploadedArray[$keyFileToInsert], true);
				}
			}
			
			// update file order - this will be only if $this->show == update
			foreach($this->POST as $kPost=>$vPost) {
				if(strpos($kPost, 'orderoffile_') === 0) {
					$this->DB->fetch( '
						UPDATE `_adminfiles`
						SET `order` = "'.(int)$vPost.'"
						WHERE `idfile` = :oFile
					', array(
						':oFile'=>str_replace('orderoffile_', '', $kPost)
					), true );
				}
			}

			// after submit, redirect.
			// if DEFAULT [false or whatever...]
			if(!in_array($this->gotoAfterAction, array('list', 'insert', 'update')) ) {
				if($this->show == 'update') {
					$this->gotoAfterAction = 'update';
				} else {
					$this->gotoAfterAction = 'insert';
				}
			}
			// check action to take [URL to go]
			switch($this->gotoAfterAction) {
				case 'list':
				case 'insert':
					$urlRedirect = array( 'edit'=>0, 'section'=>$this->section, 'show'=>$this->gotoAfterAction ); break;
				case 'update':
					$urlRedirect = array( 'edit'=>$idRecord, 'section'=>$this->section, 'show'=>'update' ); break;
			}
			header('Location: '.$this->url($urlRedirect, '&'));
			exit;
			
		}
		
		
	}
	
	
	protected function makeUploadFile($fileKey, $options) {
		
		// if no file, return false
		if(!isset($this->FILES[$fileKey]['name']) || empty($this->FILES[$fileKey]['name'])) {
			return false;
		}
		if($this->FILES[$fileKey]['error'] != 0) {
			$haveError = 1;
			$this->error[] = sprintf(lang::translate('cannot_upload_file_for_'), $this->title(isset($options['label'])?$options['label']:$field) );
		}
		if($this->FILES[$fileKey]['size'] > $this->maximulFileSize*1024) {
			$haveError = 1;
			$this->error[] = sprintf(lang::translate('the_file_is_larger_than_'), $this->title(isset($options['label'])?$options['label']:$field), number_format($this->maximulFileSize/1024, 1, '.', '') );
		}
		// $this->error can be set upper, from filters or other
		if(isset($haveError)) { return false; }
		
		$newNameOfFile = uniqid();
		if(substr($options['file']['location'], -1) != '/') {
			$options['file']['location'] = $options['file']['location'] . '/';
		}
		$ext = $this->extension($this->FILES[$fileKey]['name']);
		$_final_newNameOfFile = $this->folder . $options['file']['location'] . $newNameOfFile.'.'.$ext;

		if(!is_dir($this->folder.$options['file']['location'])) {
			mkdir($this->folder.$options['file']['location'], 0777) or die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />Cannot create folder.');
		}
		if(false == @copy($this->FILES[$fileKey]['tmp_name'], $_final_newNameOfFile)) {
			$haveError = 1;
			$this->error[] = sprintf(lang::translate('cannot_upload_file_for_'), $this->title(isset($options['label'])?$options['label']:$field) );
		}
		
		// stop if cannot upload
		if(isset($haveError)) { return false; }
		
		// if we have to resize
		if(empty($this->error) && isset($options['file']['resize'])) {
			$phpThumb = new phpThumb;
			// create sizes of thumbnail
			$capture_raw_data = false; // set to true to insert to database rather than render to screen or file (see below)
			foreach ($options['file']['resize'] as $thumbnailSize=>$typeOfResize) {
				
				list($_w, $_h) = explode('x', $thumbnailSize);
				
				// this is very important when using a single object to process multiple images
				$phpThumb->resetObject();

				// set data source -- do this first, any settings must be made AFTER this call
				$phpThumb->setSourceFilename($_final_newNameOfFile);
				// $phpThumb->setSourceFilename($_FILES['userfile']['tmp_name']);
				// or $phpThumb->setSourceData($binary_image_data);
				// or $phpThumb->setSourceImageResource($gd_image_resource);

				// PLEASE NOTE:
				// You must set any relevant config settings here. The phpThumb
				// object mode does NOT pull any settings from phpThumb.config.php
				# $phpThumb->setParameter('config_document_root', $this->folder);
				//$phpThumb->setParameter('config_cache_directory', '/tmp/persistent/phpthumb/cache/');

				// make image rotate
				if(isset($options['file']['rotate'])) {
					$phpThumb->ra = (int)$options['file']['rotate'];
				}
				
				if(isset($options['file']['background']) && strlen($options['file']['background']) == 6) {
					$phpThumb->setParameter('bg', $options['file']['background']);
				} else {
					$phpThumb->setParameter('bg', 'FFFFFF'); 
				}
				
				if(isset($options['file']['fixed-aspect']) && $typeOfResize == 'resize') {
					$phpThumb->setParameter('far', 'FFFFFF');
				}
				
				$phpThumb->setParameter('w', $_w);
				$phpThumb->setParameter('h', $_h);
				$phpThumb->setParameter('iar', false);
				
				// make crop, not resize
				if($typeOfResize == 'crop') {
					$phpThumb->setParameter('zc', 'C');
				}
				
				//$phpThumb->setParameter('fltr', 'gam|1.2');
				if(isset($options['file']['watermark'])) {
					if(is_array($options['file']['watermark']) && isset($options['file']['watermark'][$thumbnailSize])) {
						$phpThumb->setParameter('fltr', 'wmi|'.$options['file']['watermark'][$thumbnailSize].'|C|75|20|20');
					} else if(is_file($options['file']['watermark'])) {
						$phpThumb->setParameter('fltr', 'wmi|'.$options['file']['watermark'].'|C|75|20|20');
					}
				}

				// set options (see phpThumb.config.php)
				// here you must preface each option with "config_"
				$phpThumb->setParameter('config_output_format', $ext );
				// $phpThumb->setParameter('config_imagemagick_path', '/usr/local/bin/convert');
				// $phpThumb->setParameter('config_imagemagick_path', IMAGICKPATH);
				// $phpThumb->setParameter('config_allow_src_above_docroot', true); // needed if you're working outside DOCUMENT_ROOT, in a temp dir for example

				// generate & output thumbnail
				$folderToMove = $this->folder.$options['file']['location'].$thumbnailSize.'/';
				if(!is_dir($folderToMove)) {
					mkdir($folderToMove, 0777) or die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />Cannot create folder at.');
				}
				$output_filename = $folderToMove . $newNameOfFile . '.' . $phpThumb->config_output_format;

				if ($phpThumb->GenerateThumbnail()) {
					$output_size_x = ImageSX($phpThumb->gdimg_output);
					$output_size_y = ImageSY($phpThumb->gdimg_output);
					$phpThumb->RenderToFile($output_filename);
					$phpThumb->purgeTempFiles();
					
				} else {
					$this->error[] = sprintf(lang::translate('fail_cannot_resize_file'), $phpThumb->fatalerror, htmlentities(implode("\n* ", $phpThumb->debugmessages) ) );
					@unlink($output_filename); @unlink($_final_newNameOfFile);
					return false;
				}
			}
			
			// delete original file after resize
			if(isset($options['file']['keep-original']) && $options['file']['keep-original'] == false) {
				@unlink($this->folder.$options['file']['location'].$newNameOfFile.'.'.$ext);
			}
		
		}
		
		return $newNameOfFile.'.'.$ext;

	}
	
	// digits, number, date, mail, number, username
	protected function validateFilter($field, $options) {
		// check value
		$value = isset($this->POST[$field]) ? $this->POST[$field] : '';
		// if required, cannot pass
		if($value == '' && isset($options['required']) && $options['required']) {
			return false;
		}
		// if no filter, all OK
		$filter = isset($options['filter']) ? $options['filter'] : '';
		if($filter == false) return true;
		
		// check if we have files
		if(empty($value)) {
			$multipleFiles = isset($options['file']['multiple']) ? (int)$options['file']['multiple'] : 1;
			for($iFiles = 1; $iFiles<=$multipleFiles; $iFiles++) {
				$value = isset($this->FILES[$field.'_'.$iFiles]['name']) ? $this->FILES[$field.'_'.$iFiles]['name'] : '';
				if($value) {
					$ext = $this->extension($value);
					switch($filter) {
						case 'image':
							return in_array($ext, array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'ico', 'wbmp'));
						case 'document':
							return in_array($ext, array('doc', 'docx', 'pdf', 'odf'));
						case 'archive':
							return in_array($ext, array('zip', 'rar', '7z', 'gzip', 'tar'));
						case 'video':
							return in_array($ext, array('jpeg', 'flv', 'avi', 'mpg', 'mpeg', 'mov'));
					}
				}
			}
		}
		
		// if empty value and not required, don't validate nothing
		if( ($value == '' || $value == '0000-00-00 00:00:00' || $value == '0000-00-00') && ( !isset($options['required']) || false == $options['required'] ) ) {
			return true;
		}
		
		// if we have value, we make the filter
		switch($filter) {
			
			case 'alphanum':
				return ctype_alnum((string)$value);
				
			case 'digits':
				return ctype_digit((string)$value);
				
			case 'number':
				return is_numeric($value);
				
			case 'date':
				$dateParts = explode(' ', (string)$value);
				$dateParts = $dateParts[0];
				$dateParts = explode('-', $dateParts);
				if(count($dateParts) != 3) return false;
				# $this->debug($dateParts);
				return checkdate($dateParts[1], $dateParts[2], $dateParts[0]);
				
			case 'mail':
				return filter_var($value, FILTER_VALIDATE_EMAIL);

			case 'username':
				$value = str_replace(array('_', '-'), '', $value);
				return ctype_alnum((string)$value);
		}
		return true;
	}

	
	
	// password, textarea, select, file, checkbox, order, hidden, date (with calendar)
	// add some elements
	
	protected function addActionButtons($what) {
		// check parameter
		if(empty($what) || !is_array($what)) { return false; }
		// default templates
		$templates = array(
			'insert' => false == $this->USER->can('insert') ? '' : '<a href="'.$this->url(array('edit'=>0, 'page'=>1, 'section'=>$this->section, 'show'=>'insert')).'">'.lang::translate('insert_new').'</a>',
			'home' => '<a href="'.BASE_URL.'"><b>'.lang::translate('home').'</b></a>',
			'list' => false == $this->USER->can('list') ? '' : '<a href="'.$this->url(array('edit'=>0, 'section'=>$this->section, 'show'=>'list')).'">'.lang::translate('go_to_list').'</a>',
			'delete' => false == $this->USER->can('delete') ? '' : '<a href="'.$this->url(array('edit'=>$this->edit, 'section'=>$this->section, 'show'=>'delete')).'" onclick="return confirm(\''.$this->h(lang::translate('confirm_delete_record')).'\')">'.lang::translate('delete_record').'</a>',
			'filter' => '<a href="#" onclick="return addNewFormFilter()">'.lang::translate('add_filter').'</a>',
			'export' => '<a href="'.$this->url(array('show'=>'export')).'" onclick="this.style.display=\'none\'">'.lang::translate('export_csv').'</a>',
			'multidelete' => false == $this->USER->can('delete') ? '' : '<a style="float:right" href="'.$this->url(array('edit'=>'MULTIPLE', 'section'=>$this->section, 'show'=>'delete')).'" id="makeMultipleDeletes">'.lang::translate('delete_selected').'</a>',
		);
		// if navigation is off, don't allow filters 
		if($this->navigation == false) {
			foreach($templates as $kTemp=>$vTemp) {
				if( false == in_array($kTemp, array('insert', 'list', 'delete', 'multidelete') ) ) {
					unset($templates[$kTemp]);
				}
			}
		}
		// hide some buttons, no matter what
		if(!empty($this->buttonsToHide)) {
			foreach($templates as $k1Temp=>$v1Temp) {
				if( in_array($k1Temp, $this->buttonsToHide ) ) {
					unset($templates[$k1Temp]);
				}
			}
		}
		// make the output to an array
		$output = array();
		foreach($what as $makeButton) {
			if(isset($templates[$makeButton])) {
				$output[] = $templates[$makeButton];
			}
		}
		// final stuff
		$this->actionButtons = '<p class="_actionButtons">'.implode(' ', $output).'</p>';
	}
	
	
	protected function input($field, $options) {
		
		$out = '';
		$value = $this->h(
			// set as THE POST
			isset($this->POST[$field]) ? $this->POST[$field] : (
				// if we have edit, we have a record
				isset($this->record[$field]) ? $this->record[$field] : (
					// if we have a value, will take it
					isset($options['value']) ? $options['value'] : ''
				)
			)
		);
		
		// if not a field, show only a string value
		// false == $this->isField($field)
		if( isset($options['isfield']) && $options['isfield'] == false && $options['type'] != 'file' ) {
			return $this->renderCell($value, $options);
		}

		// readonly is hidden only for update
		if(isset($options['readonly']) && $options['readonly'] && $this->show == 'update') {
			$options['type'] = 'hidden';
		}
		
		// prepare options
		$_f_width = isset($options['width']) ? $options['width'] : $this->defaultValues['fieldWidth'];
		$_f_height = isset($options['height']) ? $options['height'] : $this->defaultValues['fieldHeight'];

		// check type
		switch($options['type']) {

			case 'date':
				$out .= '<input type="text" name="'.$field.'" id="'.$field.'" value="'.$value.'" class="dp" style="width:'.$_f_width.'px" />';
				break;
			
			case 'checkbox':
				$out .= '<input type="checkbox" name="'.$field.'" id="'.$field.'" value="1"'.($value ? ' checked="checked"' : '').' />';
				break;
			
			case 'file':
				// show current files
				$filesArray = $this->getFileField(isset($this->record[$field]) ? $this->record[$field] : false, $options, isset($this->record[$this->primaryKey]) ? $this->record[$this->primaryKey] : '');
				if(false == $filesArray) {
					$noOfImages = 0;
				} else if(false == is_array($filesArray)) {
					$noOfImages = 0;
					if(isset($options['file']['resize'])) {
						$ToAddAfterDelete = '<img src="'.$filesArray.'" alt="" style="height:'.$this->defaultValues['smallThumbsHeight'].'px;width:auto;border:0 none;margin:0 0 -5px 0;padding:0" />';
					} else {
						$ToAddAfterDelete = '<a href="'.$filesArray.'" target="_blank">['.basename($filesArray).']</a>';
					}
					$deleteButtonSingle = '';
					if($this->USER->can('deletefile')) {
						$deleteButtonSingle = '<a href="'.$this->url(array('show'=>'deletefile', 'edit'=>array( $options['file'], $field, $this->record[$this->primaryKey] ) )).'" onclick="return confirm(\''.$this->h(lang::translate('confirm_delete_picture')).'\')" class="_deletebutton"><img src="images/ico_make-delete.png" alt="'.lang::translate('act_delete', 1).'" title="'.lang::translate('act_delete', 1).'" /></a>';
					}
					$out .= '<p style="padding:1px 0;margin:0">' . $deleteButtonSingle . ' ' . $ToAddAfterDelete . '</p>';
				} else {
					$noOfImages = count($filesArray);
					if($noOfImages)
					foreach($filesArray as $imgPath) {
						if(isset($options['file']['resize'])) {
							$ToAddAfterDelete = '<img src="'.$imgPath['url'].'" alt="" style="height:'.$this->defaultValues['smallThumbsHeight'].'px;width:auto;border:0 none;margin:0 0 -5px 0;padding:0" />';
						} else {
							$ToAddAfterDelete = '<a href="'.$imgPath['url'].'" target="_blank">['.basename($imgPath['url']).']</a>';
						}
						$deleteButtonMulti = '';
						if($this->USER->can('deletefile')) {
							$deleteButtonMulti = '<a href="'.$this->url(array('show'=>'deletefile', 'edit'=>array( $options['file'], $imgPath['id'], $this->record[$this->primaryKey] ) )).'" onclick="return confirm(\''.$this->h(lang::translate('confirm_delete_picture')).'\')" class="_deletebutton"><img src="images/ico_make-delete.png" alt="'.lang::translate('act_delete', 1).'" title="'.lang::translate('act_delete', 1).'" /></a>';
						}
						$out .= '<p style="padding:1px 0;margin:0">' . $deleteButtonMulti . ' ' . $ToAddAfterDelete .
							( $options['file']['order'] ? ' <input type="text" name="orderoffile_'.$imgPath['id'].'" id="orderoffile_'.$imgPath['id'].'" value="'.$imgPath['order'].'" style="width:20px" onclick="this.select()" /> ' : '' ) . '</p>';
					}
				}
				// prepare files
				$multipleFiles = isset($options['file']['multiple']) ? (int)$options['file']['multiple'] : 1;
				if($multipleFiles > 1 && ( !isset($options['file']['for']) || $options['file']['for'] === false ) ) {
					die('Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
					Cannot have more than one files for one field.');
				}
				if($multipleFiles == 1) {
					$options['file']['order'] = false;
				}
				$multipleFiles = $multipleFiles - $noOfImages;
				if($this->USER->can('uploadfile')) {
					if($multipleFiles > 0) {
						for($iFiles = 1; $iFiles<=$multipleFiles; $iFiles++) {
							$out .= '<p class="_fileLine"><input type="file" name="'.$field.'_'.$iFiles.'" id="'.$field.'_'.$iFiles.'" />';
							if(isset($options['file']['order']) && $options['file']['order']) {
								$out .= ' <input type="text" name="'.$field.'_'.$iFiles.'_order" id="'.$field.'_'.$iFiles.'_order" value="'.$iFiles.'" style="width:20px" onclick="this.select()" /></p>';
							}
						}
					}
				}
				break;

			case 'select':
				$out .= '<select name="'.$field.'" id="'.$field.'"> <option value=""></option>';
				foreach($this->getSelectField($options) as $selKey=>$selVal) {
					$out .= '<option value="'.$this->h($selKey).'"'.($selKey == $value ? ' selected="selected"' : '').'>'.$this->h($selVal).'</option>';
				}
				$out .= '</select>';
				break;
			
			case 'textarea':
				$out .= '<textarea name="'.$field.'" id="'.$field.'" cols="1" rows="1" style="width:'.$_f_width.'px;height:'.$_f_height.'px">'.$value.'</textarea>';
				break;
			
			case 'hidden':
				$out = '<input type="hidden" name="'.$field.'" id="'.$field.'" value="'.$value.'" />'.$value;
				break;
			
			case 'password':
				$out = '<input type="password" name="'.$field.'" id="'.$field.'" value="'.$value.'" style="width:'.$_f_width.'px" onclick="this.select()" />';
				break;
			
			default:
			case 'order':
			case 'text':
				$out = '<input type="text" name="'.$field.'" id="'.$field.'" value="'.$value.'" style="width:'.$_f_width.'px" />';
				break;
			
		}
		// text, password, textarea, select, file, checkbox, date (with calendar)
		return $out;
	}
	
	
	
	// make HTML render
	
	
	protected function renderInsert() {
		$this->form = '<form action="" method="post"' . ($this->haveFieldType('file') ? ' enctype="multipart/form-data"' : '' ) . '>
			<input type="hidden" name="actionFormSubmited" value="1" />
			<table class="_formtable" cellspacing="0" cellpadding="0">';

		foreach($this->fields as $field=>$options) {

			$formField = $this->input($field, $options);
			
			$this->form .=
				'<tr>
					<td width="'.$this->defaultValues['formLeftWidth'].'">' .
						$this->title( isset($options['label']) ? $this->h($options['label']) : $field ) . (isset($options['required']) && $options['required'] ? ' *' : '') .
					'</td> <td>' .
						$formField .
					'</td> 
				</tr>';
		}
		$this->form .=
			'<tr> <td>&nbsp;</td>
				<td>
					<input type="submit" class="submit" name="insertForm" id="insertForm" value="'.lang::translate('submit').'" />
					<input type="reset" class="submit" name="resetForm" id="resetForm" value="'.lang::translate('reset').'" onclick="return confirm(\''.lang::translate('are_you_sure_reset').'\')" />
				</td>
			</tr>
		</table> </form>';
	}
	
	
	protected function renderUpdate() {
		$this->form = '<form action="" method="post"' . ($this->haveFieldType('file') ? ' enctype="multipart/form-data"' : '' ) . '>
			<input type="hidden" name="actionFormSubmited" value="1" />
			<table class="_formtable" cellspacing="0" cellpadding="0">';
		
		foreach($this->fields as $field=>$options) {
			
			$formField = $this->input($field, $options);
			
			$this->form .=
				'<tr>
					<td width="'.$this->defaultValues['formLeftWidth'].'">' .
						$this->title( isset($options['label']) ? $this->h($options['label']) : $field ) . (isset($options['required']) && $options['required'] ? ' *' : '') .
					'</td> <td>' .
						$formField .
					'</td>
				</tr>';
		}
		$this->form .=
			'<tr>
				<td>&nbsp;</td>
				<td>
					<input type="submit" class="submit" name="updateForm" id="updateForm" value="'.lang::translate('submit').'" />
					<input type="reset" class="submit" name="resetForm" id="resetForm" value="'.lang::translate('reset').'" onclick="return confirm(\''.lang::translate('are_you_sure_reset').'\')" />
				</td>
			</tr>
		</table></form>';
	}
	
	
	protected function renderList($export = false) {
		
		// build filter
		$theFilter = $this->buildFilter();

		// maximum no of records
		$sqlMax = 'SELECT COUNT(`'.$this->primaryKey.'`) numb FROM `'.$this->table.'` ' . $theFilter['keys'];
		# $this->debug($theFilter);
		$rec = $this->DB->fetch($sqlMax, $theFilter['values'], true);
		$max = $rec['numb'];
		# $this->debug($max, 1, 1);
		$this->listTable = '<table class="_listing" cellspacing="0" cellpadding="0">' . $this->renderListHeader() . '<tbody>';
		
		// no need to create the other SQL
		if($max == 0) {
			$this->listTable .= $this->renderNoResults();
			$this->listTable .= '</tbody></table>';
			return false;
		}
		
		// get limited fields
		$allFields = $this->getDatabaseFields();
		$sql = '
			SELECT `' . implode ( '`, `', $allFields ) . '`
			FROM `'.$this->table.'` ' .
			$theFilter['keys'] .
			$this->buildOrderBy() .
			( $export ? '' : $this->buildLimit($max) )
		;
		$record = $this->DB->fetch($sql, $theFilter['values']);
		
		// make export for all records
		if($export) {
			// if no _export_ dir, create one
			$folderToPutExcel = $this->folder.$this->exportFolder.'_excels_/';
			if(!is_dir($folderToPutExcel)) {
				@mkdir($folderToPutExcel, 0777);
			}
			// create temp file
			$fileToDownload = $this->section.'-'.date('Y-M-d_G-i-s').'.csv';
			if(false === ( $fp = fopen($folderToPutExcel.$fileToDownload, 'w') ) ) {
				die('
					Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
					Cannot create file!<br />
					Check permisions for the /upload/ folder.<br />
					And, make sure it exists.
				');
			}
			// create the header
			if($this->addCSVHead) {
				fputcsv($fp, $allFields);
			}

			// add records
			foreach ($record as $line) {
				if($this->exportCSVString) {
					$finalLine = array();
					foreach($line as $e_field=>$e_value) {
						if(isset($this->fields[$e_field]) && $this->fields[$e_field]['type'] == 'select') {
							$finalLine[] = $this->renderCell( $line[$e_field], $e_options, $line[$this->primaryKey] );
						} else {
							$finalLine[] = $line[$e_field];
						}
					}
				} else {
					$finalLine = $line;
				}
				fputcsv($fp, $finalLine);
			}
			fclose($fp);
			// export to file and keep the filename
			$_SESSION['_exported_excels_'][] = array($fileToDownload, date('d M Y, G:i:s'), $this->filter);
			header('Location: '.$this->url(array('show'=>'list', 'filter'=>$this->filter), '&'));
			exit;
		}
		
		// render lines
		foreach($record as $rec) {
			$this->listTable .= '<tr>';
			foreach($this->fields as $field=>$options) {
				$haveValue = isset($options['value']) ? $options['value'] : '';
				// check linkTo
				if(isset($options['linkTo']['filter']) && is_array($options['linkTo']['filter'])) {
					foreach($options['linkTo']['filter'] as $whattofilter=>$optionsoffilter) {
						if(in_array($optionsoffilter[0], $this->getDatabaseFields())) {
							$options['linkTo']['filter'][$whattofilter][0] = $rec[$optionsoffilter[0]];
						}
					}
				}
				// add line
				$this->listTable .= '
				<td style="width:'.(isset($options['width']) ? $options['width'] : $this->defaultValues['fieldWidth'] ).'px">' .
					$this->renderCell( $this->isField($field) ? $rec[$field] : $haveValue, $options, $rec[$this->primaryKey] ) . '&nbsp;' .
				'</td>';
			}
			$this->listTable .= '<td width="105" id="recordToDelete'.$rec[$this->primaryKey].'">
				'.(false == $this->USER->can('update') ? '' : '<a href="' . $this->url(array('show'=>'update', 'edit'=>$rec[$this->primaryKey])) . '"><img src="images/ico_make-update.png" alt="'.lang::translate('act_update', 1).'" title="'.lang::translate('act_update', 1).'" /></a> ').'
				'.(false == $this->USER->can('delete') ? '' : '<a href="' . $this->url(array('show'=>'delete', 'edit'=>$rec[$this->primaryKey])) . '" onclick="return confirm(\''.$this->h(lang::translate('confirm_delete_record')).'\')" class="_deletebutton"><img src="images/ico_make-delete.png" alt="'.lang::translate('act_delete', 1).'" title="'.lang::translate('act_delete', 1).'" /></a> ').'
				'.(false == $this->USER->can('delete') ? '' : '<input type="checkbox" name="goAndDeleteRecord[]" id="goAndDeleteRecord'.$rec[$this->primaryKey].'" value="'.$rec[$this->primaryKey].'" class="makeDelete" style="float:right" onchange="if(this.checked) { $(\'#recordToDelete'.$rec[$this->primaryKey].'\').parent().addClass(\'selected\'); } else { $(\'#recordToDelete'.$rec[$this->primaryKey].'\').parent().removeClass(\'selected\'); }" />').'
			&nbsp;</td>';
			$this->listTable .= '</tr>';
		}
		$this->listTable .= '</tdbody></table>';
		$this->listPages = $this->renderListPages($max);
	}
	
	
	protected function renderCell($value, $options, $key=0) {
		// if we choose not to show the value
		if(isset($options['hideCharacters']) && $options['hideCharacters']) {
			return '********';
		}
		
		// output init
		$output = '';
		
		// force text file for any non-field
		if(isset($options['isfield']) && $options['isfield'] == false) {
			$options['type'] = 'text';
		}
				
		// check some types
		switch($options['type']) {
			
			// select
			case 'select':
				$output = $this->getSelectField($options, $value);
				break;
			
			// password field
			case 'password':
				$output = substr($value, 0, 3).'*****';
				break;
			
			// date
			case 'date':
				$output = date('d M Y, G:i', strtotime($value));
				break;
			
			// select
			case 'file':
				$filesArray = $this->getFileField($value, $options, $key);
				if(false == $filesArray) {
					$output = 'No image.';
				} else if(false == is_array($filesArray)) {
					if(isset($options['file']['resize'])) {
						$output = '<img src="'.$filesArray.'" alt="'.$filesArray.'" title="'.$filesArray.'" style="height:'.$this->defaultValues['smallThumbsHeight'].'px;width:auto;border:0 none;margin:0;padding:0" />';
					} else {
						$output = '<a href="'.$filesArray.'" target="_blank">['.basename($filesArray).']</a>';
					}
				} else {
					$someFilesToImplode = array();
					foreach($filesArray as $imgPath) {
						if(isset($options['file']['resize'])) {
							$output .= '<img src="'.$imgPath['url'].'" alt="'.$imgPath['url'].'" title="'.$imgPath['url'].'" style="height:'.$this->defaultValues['smallThumbsHeight'].'px;width:auto;border:0 none;margin:0;padding:0" /> ';
						} else {
							$someFilesToImplode[] = '<a href="'.$imgPath['url'].'" target="_blank">['.basename($imgPath['url']).']</a>';
						}
					}
					if(!empty($someFilesToImplode)) {
						$output = implode('<br />', $someFilesToImplode);
					}
				}
				break;
			
			// date
			case 'checkbox':
				$output = (int)$value ? '<span class="_ck_yes"><img src="images/ico_active.png" alt="" /></span>' : '<span class="_ck_no"><img src="images/ico_not-active.png" alt="" /></span>';
				break;
				
			// simple text
			default:
				// if the output has more than $this->charsLimit chars
				if(strlen($value) <= $this->charsLimit) {
					$output = $this->h($value);
				} else {
					$output = substr($this->h($value), 0, $this->charsLimit).'....';
				}
				break;
			
		}

		if(isset($options['linkTo']) && is_array($options['linkTo'])) {
			$urlToGo = $this->url($options['linkTo']);
		}
		if(isset($urlToGo)) {
			return '<a href="'.$urlToGo.'">'.$output.'</a>';
		} else {
			return $output;
		}
		
	}
	
	
	protected function renderNoResults() {
		return
			'<tr>
				<td colspan="'.( count($this->fields)+1 ).'">No results!</td>
			</tr>'; // colspan COUNT(fields) + actions
	}
	
	
	protected function renderListHeader() {
		// start header
		$out = '<thead><tr class="_header">';
		// check every firld
		foreach($this->fields as $field=>$options) {
			// set sort URL
			$orderArray = array();
			if($this->isField($field)) {
				$orderArray = array( 'order'=>array( $field =>isset($this->order[$field]) && $this->order[$field] == 'asc' ? 'desc' : 'asc' ) );
			}
			// define the label
			$theLabel = $this->title( isset($options['label']) ? $this->h($options['label']) : $field );
			// set an icon (if we have an order)
			$haveIcon = '';
			if(isset($this->order[$field])) {
				$haveIcon = ' <img src="images/order-arrow-'.( $this->order[$field] == 'desc' ? 'desc' : 'asc' ).'.gif" />';
			}
			// render output
			$out .= '<th>
				'.( !empty($orderArray) ? '<a href="'.$this->url($orderArray).'">'. $theLabel . '</a>' : $theLabel ) . $haveIcon . '
			</th>';
		} $out .= '<th>Actions</th> </tr></thead>';
		return $out;
	}
	
	
	protected function renderListPages($max) {
		// no of pages
		$noOfPages = ceil($max/$this->showRecords);
		if($noOfPages == 1) return '';
		// build LI pages
		$out = '<ul class="_pages">';
		for($_i=1; $_i<=$noOfPages; $_i++) {
			$out .= '<li'.($_i == $this->page ? ' class="selected"' : '').'><a href="' . $this->url(array('page'=>$_i)) . '">'.$_i.'</a></li>';
		}
		// make return
		$out .= '</ul>';
		return $out;
	}
	
	
	
	// get custom fields
	
	
	public function getSelectField($options, $value=false) {
		$output = array();
		// if from database
		if(isset($options['select']['fields'], $options['select']['from'], $options['select']['on'])) {
			// prepare fields
			$fields[] = $options['select']['on'];
			$fields = array_merge($fields, explode ( ',', $options['select']['fields'] ));
			foreach($fields as &$fValue) $fValue = trim($fValue);
			// get from database
			$sqlWhere = ''; $prepare = array();
			if($value !== false) {
				$sqlWhere .= ' AND ' . $options['select']['on'] . ' = :on ';
				$prepare[':on'] = $value;
			}
			if(isset($options['select']['where'])) {
				$sqlWhere .= ' AND ' . $options['select']['where'];
			}
			// make sql
			$sqlFields = '
				SELECT `'.implode('`, `', $fields).'`
				FROM `'.$options['select']['from'].'`
				WHERE 1 ' . $sqlWhere;
			// get records
			$getFields_res = $this->DB->fetch($sqlFields, $prepare);
			# $this->debug($getFields_res ,1 ,1 );
			foreach($getFields_res as $getFields_rec) {
				$getFields_rec = $this->h($getFields_rec);
				$output[$getFields_rec[$options['select']['on']]] = implode (' | ', array_values($getFields_rec));
			}
		} else {
			$output = $options['select'];
		}
		// return out
		# if(count($output) == 1) { return current(array_values($output)); }
		if(isset($value) && $value !== false) {
			if(isset($output[$value])) {
				return $output[$value];
			} else {
				return '-';
			}
		}
		return $output;
	}
	
	
	protected function getFileField($value, $options, $key) {
		// if it's a file based field and has no value, return false
		if( ( !isset($options['file']['for']) || $options['file']['for'] == false ) && !$value ) {
			return false;
		}
		// if we have a value [it's a file based field]
		if($value) {
			if(substr($options['file']['location'], -1) != '/') {
				$options['file']['location'] .= '/';
			}
			return BASE_URL.$options['file']['location'].$this->fileMinSize(isset($options['file']['resize'])?$options['file']['resize']:'').$value;
		} else if(isset($options['file']['for']) && $options['file']['for'] != false ){
			$res = $this->DB->fetch('
				SELECT `idfile`, `filepath`, `order`
				FROM `_adminfiles`
				WHERE
					`for_type` = :for
					AND `for_id`= :id
				ORDER BY `order` ASC
			', array(
				':for'=>$options['file']['for'],
				':id'=>$key
			) );
			if(!empty($rec)) { return false; }
			$outFiles = array();
			foreach($res as $rec) {
				$outFiles[] = array(
					'url'=>BASE_URL.$options['file']['location'].$this->fileMinSize(isset($options['file']['resize'])?$options['file']['resize']:'').$rec['filepath'],
					'id'=>$rec['idfile'],
					'order'=>$rec['order']
				);
			}
			return $outFiles;
		}
		return false;
	}
	
	
	protected function fileMinSize($sizes) {
		if(empty($sizes)) return '';
		$allSizes = array();
		$sizeOfTheKey = array();
		foreach($sizes as $kSize=>$type) {
			$size = explode('x', $kSize);
			$allSizes[] = $size[0];
			$sizeOfTheKey[$size[0]] = $kSize;
		}
		return $sizeOfTheKey[min($allSizes)].'/';
	}
	
	

	// database SQL
	
	
	protected function buildFilter() {
		$sqlWhere = array();
		$filterValues = array();
		foreach($this->filter as $field=>$search) {
			// default sign is '=' (if not set)
			if(!isset($search[1])) {
				$search[1] = '=';
			}
			// if we have LIKE, use % to search anywhere
			if($search[1] == 'LIKE') {
				$toSearch = '%'.$search[0].'%';
			} else {
				$toSearch = $search[0];
			}
			// make SQL parts
			$sqlWhere[] = '`'.$field.'` '.$search[1].' :'.$field;
			$filterValues[':'.$field] = $toSearch;
		}
		if(empty($sqlWhere)) return array( 'keys'=>'', 'values'=>array() );
		return array (
			'keys'		=> ' WHERE ' . implode(' AND ', $sqlWhere),
			'values'	=> $filterValues,
		);
	}
	
	
	protected function buildOrderBy() {
		$orderSql = array();
		foreach($this->order as $field=>$how) {
			$orderSql[] = '`'.$field.'` ' . ( strtolower($how) == 'desc' ? 'desc' : 'asc' );
		}
		if(empty($orderSql)) return '';
		return ' ORDER BY ' . implode(', ', $orderSql);
	}
	
	
	protected function buildLimit($max) {
		if($this->page <= 1) {
			return ' LIMIT ' . $this->showRecords;
		} else {
			$from = ($this->page-1)*$this->showRecords;
			if( $from >= $max) {
				return ' LIMIT ' . ( $max-$this->showRecords ) . ', ' . $this->showRecords ;
			}
			return ' LIMIT ' . $from . ', ' . $this->showRecords;
		}
	}
	
	
	protected function getDatabaseFields() {
		$output = array($this->primaryKey);
		foreach($this->fields as $field=>$values) {
			if($this->isField($field)) {
				$output[] = $field;
			}
		} return $output;
	}

	// check if we have some kind of field
	public function haveFieldType($type) { foreach($this->fields as $f=>$o) { if($o['type'] == $type) { return $f; } } return false; }
	
	// make htmlspecialchars on STRING or one-level ARRAY
	public function h($w) {
		if(empty($w)) return $w;
		if(false == is_array($w)) {
			return htmlspecialchars(trim($w), ENT_QUOTES );
		} else {
			$done = array();
			foreach($w as $k=>$v) {
				$done[htmlspecialchars($k, ENT_QUOTES)] = htmlspecialchars($v, ENT_QUOTES);
			}
			return $done;
		}
	}
	// render title ( no underlines )
	protected function title($w) { $w = str_replace('_', ' ', trim($w) ); return $this->h(ucfirst($w)); }
	// get extension of some string [aka file]
	protected function extension($f) { return strtolower(end(explode('.', $f))); }
	// check if current string is a field form $this->fields AND database
	protected function isField($f) { if(!isset($this->fields[$f])) return false; if( ( /* ( not file type ) and ( not specified if it's a field OR it's specified that it is ) */ $this->fields[$f]['type'] !='file' && ( !isset($this->fields[$f]['isfield']) || $this->fields[$f]['isfield'] == true ) ) || ( /* file type AND no for specified => field */ $this->fields[$f]['type'] =='file' && ( !isset($this->fields[$f]['file']['for']) || $this->fields[$f]['file']['for'] == false ) ) ) { return true; } return false; }
	// make debug [ ELEMENT, add backtrace, make exist after debug ]
	protected function debug($a, $backtrace=false, $exit=false) {
		if($backtrace) {
			$dbk = debug_backtrace();
			$finalTrace = array();
			foreach($dbk as $d) {
				 $finalTrace[] = array(
					'file'=>$d['file'],
					'line'=> $d['line'],
					'function'=> $d['function'],
					'class'=> $d['class'],
				 );
			}
			// begin backtrace
			echo '<pre style="background:#000;color:#999">';
			print_r($finalTrace);
			echo '</pre>';
		}
		// begin result
		echo '<pre style="padding:0 0 50px 0">';
		print_r($a);
		echo '</pre>';
		if($exit) {
			exit;
		}
	}
	
	// create the URL from current parameters
	public function url($replace=array(), $sign='&amp;') {
		$out = BASE_URL . '?';
		// start from the DEFAULT URL keys - if nothing set, we'll have a default
		foreach($this->URL as $urlKey=>$urlValue) {
			$theValue = isset($replace[$urlKey])?$replace[$urlKey]:$urlValue;
			if(false == is_array($theValue)) {
				$out .= $urlKey.'='.urlencode($theValue).$sign;
			} else {
				if(!empty($theValue)) {
					$out .= $urlKey.'='.urlencode(serialize($theValue)).$sign;
				} else {
					$out .= $urlKey.'='.$sign;
				}
			}
		} return $out;
	}

	
	// interface elements
	
	
	// make the menu
	public function generateMenu() {
		$out = '';
		foreach($this->menu as $section=>$but_sect) {
			// CHECK Priviledges
			if(is_array($but_sect)) {
				$tmpSubsections = '';
				foreach($but_sect as $sub_pag=>$sub_but) {
					if($this->USER->can(false, $sub_pag)) {
						$tmpSubsections .= '<a href="'.$this->url(array('show'=>'list', 'edit'=>'0', 'page'=>'1', 'order'=>'', 'filter'=>'', 'section'=>str_replace(' ', '_', $sub_pag))).'"'.(isset($_GET['section'])&&$_GET['section']==$sub_pag?' id="mensel"':'').'>'.$sub_but.'</a> ';
					}
				}
				if(!empty($tmpSubsections)) {
					$out .= '<a href="#" onclick="return openmenu(\'cont_'.md5($section).'\')">'.ucfirst(str_replace('_', ' ', $section)).'</a> 
					<div class="submeniu" id="cont_'.md5($section).'">
						'.$tmpSubsections.'
					</div>';
				}
			} else {
				if($this->USER->can(false, $section)) {
					if(strpos($section,'http://') === false)
						$out .= '<a href="'.$this->url(array('show'=>'list', 'edit'=>'0', 'page'=>'1', 'order'=>'', 'filter'=>'', 'section'=>str_replace(' ', '_', $section))).'"'.(isset($_GET['section'])&&$_GET['section']==$section?' id="mensel"':'').'>'.$but_sect.'</a> ';
					else
						$out .= '<a href="'.$section.'" target="_blank">'.$but_sect.'</a> ';
				}
			}
		}
		$out .= '<a href="'.BASE_URL.'?logout" class="logout" onclick="return confirm(\''.lang::translate('are_you_sure').'\')">'.lang::translate('logout').'</a> ';
		return $out;
	}
	
	
	// validate the REQUEST from the menu array
	public function validateInclude($p) {
		// check if we have a valid KEY
		if(in_array($p, array_keys($this->menu)) || $p == 'default') {
			return true;
		}
		// check each menu element
		foreach($this->menu as $page=>$values) {
			if(is_array($values) && in_array($p, array_keys($values))) {
				return true;
			}
		}
		// check if we have other valid page
		if(in_array($p, $this->validSections)) {
			return true;
		}
		// or... it's not valid
		return false;
	}
	
	
	// keep only valid filters from URL
	public function validateFilterURL() {
		$finalFilter = array();
		foreach($this->urlFilter as $fField=>$fOptions) {
			if(
				isset($this->fields[$fField]) &&
				( !isset($this->fields[$fField]['isfield']) || $this->fields[$fField]['isfield'] != false ) &&
				count($fOptions) == 2 &&
				in_array($fOptions[1], array('>', '=', '<', 'LIKE'))
			) {
				$finalFilter[$fField] = $fOptions;
			}
		}
		return $finalFilter;
	}
	
	// keep only valid Order from URL
	public function validateOrderURL() {
		$finalOrder = array();
		foreach($this->urlOrder as $fField=>$fOptions) {
			if(isset($this->fields[$fField]) && $this->isField($fField)) {
				$finalOrder[$fField] = $fOptions;
			}
		}
		return $finalOrder;
	}
	
	
	// get a string with current filters
	private function getCurrentfiltersFrontEnd() {
		// if no filter, show nothing
		if(empty($this->filter)) return '';
		// get each filter
		$out = '';
		foreach($this->filter as $field=>$options) {
			$tmpFilter = $this->filter;
			unset($tmpFilter[$field]);
			$out .= '<p><a href="'.$this->url(array('filter'=>$tmpFilter)).'">'.lang::translate('remove').'</a> '.$this->title(isset($this->fields[$field]['label'])?$this->fields[$field]['label']:$field) . ' '. $options[1] . ' '.$this->h($options[0]).'</p>';
		}
		return $out;
	}
	
	
	private function checkFields() {
		foreach($this->fields as $field=>$options) {
			// the type is required
			if(!isset($options['type'])) {
				return 'Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
				The field '.$field.' does not have a type.';
			}
			// files cannot be readonly
			if($options['type'] == 'file' && isset($options['readonly']) && $options['readonly']) {
				return 'Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
				The field '.$field.' is a file and cannot be readonly.';
			}
			// only text and passwords can be encrypted
			if($options['type'] != 'text' && $options['type'] != 'password' && isset($options['encrypt']) && $options['encrypt']) {
				return 'Error at line "'.__LINE__.'" in method "'.__METHOD__.'"'.(isset($this->section)?', section '.$this->section:'').'<br />
				You can only encrypt text and password fields.';
			}
		}
		return true;
	}
	
	
	// return json with available filters
	public function generateJSONAvailableFilters() {
		$arrToOutput = array();
		foreach($this->fields as $jsF=>$jsO) {
			if( ( $jsO['type'] == 'file' && isset($jsO['file']['for']) && $jsO['file']['for'] != false ) || $jsO['type'] == 'password' ) {
				// don't search into `_adminfiles` table or password fields
			} else if($jsO['type'] == 'checkbox' ) {
				$arrToOutput[$jsF] = array( $jsO['label'], array('1'=>'Yes', '0'=>'No') );
			} else if($jsO['type'] != 'select' ) {
				$arrToOutput[$jsF] = $jsO['label'];
			} else {
				$arrToOutput[$jsF] = array( $jsO['label'], $this->getSelectField($jsO) );
			}
		} return json_encode($arrToOutput);
	}
	
	
	// magic method to get protected vars
	public function __get($varName) {
		if(isset($this->$varName)) {
			return $this->$varName;
		}
	}

	
	
}



