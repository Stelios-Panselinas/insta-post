<?php
// includes/Database.php
class Database {
    private $host = 'localhost';
    private $db_name = 'eshop';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;

            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->conn;
    }

    //SELECT queries
    public function query($query) {
        return $this->conn->query($query);
    }

    //queries (INSERT, UPDATE, DELETE)
    public function exec($query) {
        return $this->conn->exec($query);
    }

    // Method to prepare a statement for safe parameterized queries
    public function prepare($query) {
        return $this->conn->prepare($query);
    }

}