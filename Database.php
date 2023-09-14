<?php
class Database{
    private $host = 'localhost';
    private $db_name = 'eshop';
    private $username = 'root';
    private $password = '';
    private $db;

    public function connect() {
        $this->db = null;

        $this->db = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        return $this->db;
    }

    //SELECT queries
    public function query($query) {
        return $this->db->query($query);
    }

    //queries (INSERT, UPDATE, DELETE)
    public function exec($query) {
        return $this->db->exec($query);
    }

    // Method to prepare a statement for safe parameterized queries
    public function prepare($query) {
        return $this->db->prepare($query);
    }
}
