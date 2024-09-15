<?php

class DB {
    private $connection;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "mindconnect";

    // Constructor to initialize the connection
    public function __construct() {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Method to execute a query
    public function query($sql) {
        $result = $this->connection->query($sql);
        
        if ($result === false) {
            return "Error: " . $this->connection->error;
        }
        
        return $result;
    }

    // Fetch all rows as an associative array
    public function fetchAll($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fetch a single row
    public function fetch($result) {
        return $result->fetch_assoc();
    }

    // Close the connection
    public function close() {
        $this->connection->close();
    }
}

?>
