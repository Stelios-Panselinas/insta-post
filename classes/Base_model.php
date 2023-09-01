<?php
class Base_model{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $db;
    function __construct(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "eshop";

        $this->db = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
// Check connection
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }
}