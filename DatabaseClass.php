<?php 
    global $conn;
    class DatabaseClass {
        private $mysqlData;
        private $conn;
        public
        function __construct(){
            $this->mysqlData = array("host" => "localhost", "username" => "root", "password" => "", "db" => "testphp");
            $this->conn = new mysqli($this -> mysqlData['host'], $this -> mysqlData['username'], $this -> mysqlData['password']) or die(($this->conn)->error);
            ($this->conn)->select_db($this -> mysqlData["db"]) or die(($this->conn)->error);   
        }
        function __destruct(){
            ($this->conn)->close();
        }
        function send_query($sqlQuery) {
            try {
                return (($this->conn)->query($sqlQuery))->fetch_all();
            }
            catch (Exception $e){
                ($this->conn)->error;
            }
        }
    }

?>

