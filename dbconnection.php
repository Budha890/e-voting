<?php 
class database{

    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($host ,$username ,$password ,$database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        try {
            $dsn = "mysql:host=$host;dbname=$database";
            $this->conn = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die("error in Database Connection: " . $e->getMessage());
        }
    }

    public function getConnection(){return $this->conn; }

}

    $connectDb = new database('localhost','root','','voting_system');

    $connection = $connectDb->getConnection();

   

?>