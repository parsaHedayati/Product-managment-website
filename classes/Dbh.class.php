<?php   
class Dbh {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function connect() {
        $this->servername = "localhost";
        $this->username = "u850010703_test1";
        $this->password = "o$6@5qE;9";
        $this->dbname = "u850010703_test1"; 
        $this->charset = "utf8mb4";

        try {
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}