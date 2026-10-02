<?php
class Database {
	private static $dbName = 'my_thenevisky';
	private static $dbHost = 'localhost';
	private static $dbUsername = 'thenevisky';
	private static $dbUserPassword = '';
	private static $cont = null;
	
	public function __construct() {
		die('Init function is not allowed');
	}//construct
	
	public static function connect() {
		if(null == self::$cont) {
			try {
				self::$cont = new PDO("mysql:host=". self::$dbHost. "; dbname=". self::$dbName, self::$dbUsername, self::$dbUserPassword);
			}catch(PDOException $e) {
				die($e->getMessage());
			}//try-catch
			return self::$cont;
		}//if
	}//connect
	
	public static function disconnect() {
		self::$cont = null;
	}//disconnect
}//Database
?>