<?php

class user {

	public $userData = null;
	public $priv = array();
	public $section = '';
	
	public static $error = false;
	
	private $POST = array();
	private $DB = null;
	
	
	public function __construct($requestArray) {
		
		// make an array with posible privileges
		if(!isset($_SESSION['POSIBLEPRIVS'])) {
			$_SESSION['POSIBLEPRIVS'] = array (
				'insert'=>lang::translate('act_insert'),
				'update'=>lang::translate('act_update'),
				'delete'=>lang::translate('act_delete'),
				'list'=>lang::translate('act_view'),
				'uploadfile'=>lang::translate('act_uploadfile'),
				'deletefile'=>lang::translate('act_deletefile'),
			);
		}
		
		// get database connection
		$this->DB = new db();
		
		// set user and pass to be checked
		$this->POST = $requestArray;
		
		// make login if not logged in
		if(!isset($_SESSION['USERAUTH']) || empty($_SESSION['USERAUTH'])) {
			$_SESSION['USERAUTH'] = $this->login();
		}

		// if cannot make login
		if(empty($_SESSION['USERAUTH'])) {
			return $this->createLoginForm();
		}
		
		// check login again, for valid info
		if(!$this->check()) {
			return $this->createLoginForm();
		}
		
		// get user data from $this->login()
		// after we know everything it's OK
		$this->userData = $_SESSION['USERAUTH'];
		
		// populate privileges array
		$this->getPriv();
		
	}
	
	// if we get here, the user is not logged in
	private function createLoginForm() {
		// how many times can he retry
		$triesLeft = MAXLOGINTRIES - ( isset($_SESSION['USERTRIES'])?$_SESSION['USERTRIES']:0);
		// if more than 5 tries
		if($triesLeft <= 0) {
			if(isset($this->POST['username']) && !empty($this->POST['username'])) {
				// update existing user
				$this->DB->fetch('
					UPDATE `_adminusers` SET `active` = 0 WHERE `username` = :username
				', array(':username'=>$this->POST['username']), true);
			}
			// die
			die('
				You tried '.(int)$_SESSION['USERTRIES'].' times in one session.<br />
				The username '.htmlentities(isset($this->POST['username']) ? $this->POST['username'] : '').' (if exists) was locked.<br />
				Contact your administrator to unlock.
			');
		}
		// if we have a POSTm it's an error if we are here
		if(isset($this->POST['username'])) {
			self::$error = '
				Login failed.<br />
				You have '.( $triesLeft < 0 ? 0 : $triesLeft ).' tries left.
			';
		}
		// make sure the AUTH var is clear
		unset($_SESSION['USERAUTH']);
		// require login form
		require dirname(__FILE__).'/../_loginform.php';
		exit;
	}
	
	// make login => get user info, if valid 'user' and 'pass'
	private function login() {

		// if no post
		if(!isset($this->POST['username']) || empty($this->POST['username'])) {
			return false;
		}
		// get SQL imfos
		$sql = '
			SELECT
				`idadmin`, `username`, `mail`, `role`, `lastloggedip`, `lastkeyused`, `lasttimestamp`
			FROM
				`_adminusers`
			WHERE
				`username` = :username
				AND `password` = :password
				AND `active` = 1
		';
		// one user cannot try more than [X] times
		if(!isset($_SESSION['USERTRIES'])) {
			$_SESSION['USERTRIES'] = 0;
		}
		$_SESSION['USERTRIES']++;
		// return values
		$result = $this->DB->fetch($sql, array(
			':username'=>isset($this->POST['username']) ? $this->POST['username'] : '',
			':password'=>isset($this->POST['password']) ? self::encrypt($this->POST['password']) :''
		), true);
		
		if(!empty($result)) {
			
			$result['lastloggedip'] = $this->getIP();
			$result['lastkeyused'] = md5(session_id() . SALT);
			$result['lasttimestamp'] = date('Y-m-d H:i:s');
			
			$this->DB->fetch('
				UPDATE `_adminusers` SET
					`lastloggedip` = :ip ,
					`lastkeyused` = :key ,
					`lasttimestamp` = NOW()
				WHERE `idadmin` = :idadmin
			', array (
				':ip'=>$this->getIP(),
				':key'=>md5(session_id() . SALT),
				':idadmin'=>$result['idadmin']
			), true);
		}
		return $result;
	}
	
	public function getIP() {
		if(isset($_SERVER)) {
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && isset($_SERVER['HTTP_CLIENT_IP'])) {
				$theIP = $_SERVER['HTTP_CLIENT_IP'];
			} else {
				$theIP = $_SERVER['REMOTE_ADDR'];
			}
		} else {
			if(getenv('HTTP_X_FORWARDED_FOR')) {
				$theIP = getenv('HTTP_X_FORWARDED_FOR');
			} else if(getenv('HTTP_CLIENT_IP')) {
				$theIP = getenv('HTTP_CLIENT_IP');
			} else {
				$theIP = getenv('REMOTE_ADDR');
			}
		}
		return $theIP;
	}
	
	public function logout() {
		$this->userData = null;
		unset($_SESSION['USERAUTH']);
		unset($_SESSION['LANGUAGE_CURRENT']);
		unset($_SESSION['LANG']);
		unset($_SESSION['LANGUAGE_ALLOWED']);
		header('Location: '.BASE_URL);
		exit;
	}
	
	public function check() {
		
		// if no session, not OK
		if( empty($_SESSION['USERAUTH']) || !isset($_SESSION['USERAUTH']['idadmin']) || empty($_SESSION['USERAUTH']['idadmin']) ) {
			return false;
		}
		
		// check if we have the
		// same session, same IP and no more than 1 hour of inactivity
		if(MULTILOGIN) {
			$question = $this->DB->fetch('
				SELECT COUNT(`idadmin`) ok FROM `_adminusers`
				WHERE
					`idadmin` = :idadmin
			', array (
				':idadmin'=>$_SESSION['USERAUTH']['idadmin']
			), true);
		} else {
			$question = $this->DB->fetch('
				SELECT COUNT(`idadmin`) ok FROM `_adminusers`
				WHERE
					`lastloggedip` = :ip AND
					`lastkeyused` = :key AND
					`lasttimestamp` > :stamp AND
					`idadmin` = :idadmin
			', array (
				':ip'=>$this->getIP(),
				':key'=>md5(session_id() . SALT),
				':stamp'=>date('Y-m-d H:i:s', time()-3600 ), // no more than 1 hours
				':idadmin'=>$_SESSION['USERAUTH']['idadmin']
			), true);
		}
		// check SQL
		if($question['ok'] == 0) {
			return false;
		}
		$this->DB->fetch('
				UPDATE `_adminusers` SET
					`lasttimestamp` = NOW()
				WHERE `idadmin` = :idadmin
			', array (
				':idadmin'=>$_SESSION['USERAUTH']['idadmin']
			), true);
		unset($_SESSION['USERTRIES']);
		return true;
		// check $this->userData [ ip, cookieID, user/pass ]
		// that can be false
	}
	
	private function getPriv() {
		// select `priv`, `page` from user_priv table
		// after userRole [ from $this->userData ]
		if(!isset($this->userData['role']) || empty($this->userData['role'])) {
			$this->priv = array();
			return false; // stop here
		}
		$record = $this->DB->fetch('
			SELECT `page`, `action` FROM `_adminprivs` WHERE `role` = :role
		', array(':role'=>$this->userData['role']) );
		$finalPrivs = array();
		foreach($record as $k=>$v) {
			if(!in_array($v['action'], isset($finalPrivs[$v['page']]) ? $finalPrivs[$v['page']] : array())) {
				$finalPrivs[$v['page']][] = $v['action'];
			}
		}
		$this->priv = $finalPrivs;
		return true;
	}
	
	// check privs for:
	// insert, update, delete, view (hide in menu)
	// uploadfiles, deletefiles, manageusers
	// can(false, 'user') => will check if you can access the section (you have any priv)
	// can('delete') => will check if you can delete in current section
	// can() => will check if you can access current section
	public function can($priv=false, $section=false) {
		// the admin can do anything
		if($this->userData['username']) {
			return true;
		}
		// if only the section, like (false, 'users')
		if($priv == false) {
			return
				isset($this->priv[$section?$section:$this->section]) &&
				!empty($this->priv[$section?$section:$this->section]);
		}
		// if no section AND have priv to check
		// CHECK: does have the priv for this page
		if(!isset($this->priv[$section?$section:$this->section])) {
			return false;
		}
		// check if a priviledge exists for current user
		foreach((array)$this->priv[$section?$section:$this->section] as $p=>$prv) {
			if($prv == $priv) {
				return true;
			}
		} return false;
	}

	
	// make sha1 encription + SALT
	public static function encrypt($val) { return sha1( SALT . $val ); }
	
}