<?php

/* 
class DbAuto is de superklasse waarvan andere klassen zijn afgeleid 
*/
class DbAuto {
  
    private $host;
    private $dbname;
    private $username;
    private $password;

    protected $conn;
    
    public $error;  

	public function __construct()
	{
        $this->host = DB_SERVER;
        $this->dbname = DB_DBNAME;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
	}
            
    public function connect()
    {
        try {
            
            $this->conn = new PDO ('mysql:host='. $this->host .';dbname='. $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) { 

            echo "Connectie met database mislukt: " . $e->getMessage();
            exit;

        }
    }
}

?>