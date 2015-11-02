<?php

class lang {

	
	private $baseURL = '';
	
	
	public function __construct( $lang = false, $URL = '' ) {
		// get database connection
		$this->DB = new db;		
		// store to session
		$this->storeAllowedLanguages();
		// set base URL [to redirect]
		$this->baseURL = $URL;
		// if we have a language, make set
		if($lang || empty($_SESSION['LANG'])) {
			$this->setLanguage($lang);
		}
	}
	

	private function storeAllowedLanguages() {
		if(!isset($_SESSION['LANGUAGE_ALLOWED'])) {
			// get available
			$sql_0 = 'SELECT DISTINCT(`lang`) available FROM `_adminlang`';
			foreach( $this->DB->fetch($sql_0) as $avail ) {
				$_SESSION['LANGUAGE_ALLOWED'][] = $avail['available'];
			}
		}
	}
	
	
	private function setLanguage($lang) {
		// default, we need english
		if(empty($lang)) { $lang = 'en'; }
		// if lang is in allowed list
		if(in_array($lang, $_SESSION['LANGUAGE_ALLOWED'])) {
			$_SESSION['LANGUAGE_CURRENT'] = $lang;
			// populate keys
			$sql = '
				SELECT `key`, `value`
				FROM `_adminlang`
				WHERE `lang` = :lang
			';
			$res = $this->DB->fetch( $sql, array( ':lang' => $lang ) );
			foreach($res as $rec) {
				$_SESSION['LANG'][$rec['key']] = $rec['value'];
			}
		}
		header('Location: '.$this->baseURL);
	}
	
	
	public static function createButtons() {
		$out = '';
		if(isset($_SESSION['LANGUAGE_ALLOWED']) && count($_SESSION['LANGUAGE_ALLOWED']) > 1) {
			foreach($_SESSION['LANGUAGE_ALLOWED'] as $lang) {
				$out .= '<a href="'.BASE_URL.'?lang='.$lang.'"'.( isset($_SESSION['LANGUAGE_CURRENT'])&&$_SESSION['LANGUAGE_CURRENT'] == $lang ? ' class="selected"' : '' ).'>'.$lang.'</a> ';
			}
		}
		return $out;
	}
	
	
	public static function translate($key, $ucfirst=false){
		if(!isset($_SESSION['LANG'][$key])) {
			return ucfirst(str_replace('_', ' ', strtolower($key)));
		}
		if($ucfirst) {
			return ucfirst($_SESSION['LANG'][$key]);
		} else {
			return $_SESSION['LANG'][$key];
		}
	}
	

}