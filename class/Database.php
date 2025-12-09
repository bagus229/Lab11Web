<?php

class Database {
    private $conn;

    public function __construct() {
        $config = require __DIR__ . '/../config.php';

        $this->conn = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['db_name']
        );

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Insert data ke tabel
    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values  = "'" . implode("', '", array_map([$this, 'escape'], $data)) . "'";

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }

    public function escape($value) {
        return $this->conn->real_escape_string($value);
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }
}
