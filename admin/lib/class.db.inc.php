<?php

/* PDO MySql Singleton Connection Resource */

class db {

	private static $_conn = null;
	private $PDOStatement = null;
	
	public function __construct($type = 'mysql') {
		if(!self::$_conn) {
			try {
				switch($type) {
					// check PDO::getAvailableDrivers()
					// to add more drivers, like mssql
					#case 'mssql':
					#case 'pgsql':
					case 'mysql':
					#case 'cubrid':
					#case 'sqlite':
					#case 'sqlite2':
						self::$_conn = new PDO($type . ':host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
						break;

					default:
						self::$_conn = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
						break;
				}
			} catch(PDOExceptions $e) {
				echo 'Connection failed: ' . $e->getmessage() . '<br>';
			}
		}

	}

	public static function getConn() {
		if (!self::$_conn) {
			$temp = new db();
		}
		return self::$_conn;
	}
	
	// don't allow clone
	private function __clone() {} 
	
	// disconnect
	public function __destruct() {
		self::$_conn = null;
	}

	// the only Database execution
	// to add another driver, edit here
	// --- AND also check
	// => $this->DB->lastInsertId($this->table);
	// --- for compatibility with your driver
	public function fetch($sql, $params = array(), $onlyOne = false) {
		// prepare, with CURSOR_FWDONLY
		$PDOobj = self::getConn();
		$this->PDOStatement = $PDOobj->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		// execute prepared SQL
		$result = $this->PDOStatement->execute($params);
		if(false == $result) {
			echo 'Invalid SQL<br />'.$sql.'<pre>';
			print_r($this->PDOStatement->errorInfo());
			die('</pre>'); // it ends here
		}
		// if need fetch
		if($onlyOne) {
			$rec = $this->PDOStatement->fetch(PDO::FETCH_NAMED);
		} else {
			$rec = $this->PDOStatement->fetchAll(PDO::FETCH_NAMED);
		}
		// close cursor, prepare for next fetch
		$this->PDOStatement->closeCursor();
		if(strpos(strtolower(trim($sql)), 'insert') === 0) {
			return $PDOobj->lastInsertId();
		}
		// return the record
		return $rec;
	}


}

