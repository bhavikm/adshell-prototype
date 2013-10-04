<?php
class Database_Library {
	private $dsn = 'mysql:host=localhost;dbname=adshell';
	private $username = 'root';
	private $password = '';
	public $db;
	
	public function __construct() 
	{
		if (!isset($this->db)) {
			try {
				$this->db = new PDO ($this->dsn,
									 $this->username,
									 $this->password);
			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				echo $error_message;
				exit();
			}
		}
	}
	
	public static function getDB () {
		if (!isset(self::$db)) {
			try {
				self::$db = new PDO (self::$dsn,
									 self::$username,
									 self::$password);
			} catch (PDOException $e) {
				$error_message = $e->getMessage();
				echo $error_message;
				exit();
			}
		}
		return self::$db;
	}
}
?>