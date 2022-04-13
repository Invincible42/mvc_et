<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// DataHandler Class
class DataHandler{

    // Properties
	private $host;
	private $dbdriver;
	private $dbname;
	private $username;
	private $password;

    // Methods
	public function __construct($host, $dbdriver, $dbname, $username, $password) {
		$this->host = $host;
		$this->dbdriver = $dbdriver;
		$this->dbname = $dbname;
		$this->username = $username;
		$this->password = $password;

		try {
			$this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return true;
		} catch (PDOException $e) {
			echo "Connection with ".$this->dbdriver." failed: ".$e->getMessage();
		}
	}

	public function __destruct() {
		$this->dbh = null;
	}

	public function createData($sql) {
		$sth = $this->query($sql);
		return $this->lastInsertId();
	}

	public function readData($sql) {
		$sth = $this->query($sql);
		return $sth->fetchAll(PDO::FETCH_ASSOC);   
	}

	public function readsData($sql) {
		$sth = $this->query($sql);
		return $sth->fetchAll(PDO::FETCH_ASSOC);   
	}

	public function updateData($sql) {
		$sth = $this->query($sql);
		return $this->rowCount();
	}

	public function deleteData($sql) {
		$sth = $this->query($sql);
		return $sth->rowCount();
	}

	public function query($sql) {  
		$sth = $this->dbh->prepare($sql);
        $sth->execute();
		return $sth;
	}

	public function lastInsertId() {  
		return $this->dbh->lastInsertId();  
	}
}
?>