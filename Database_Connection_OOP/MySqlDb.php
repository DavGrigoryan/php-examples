<?php

class MySqlDb
{
    protected string $host;
    protected string $username;
    protected string $password;
    protected string $db;
    protected $connection;

    function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = 'Chalputurik-2021';
        $this->db = 'php_code_examples';
        $this->connect();
    }

    private function connect(): void
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    function getData($table, $where)
    {
        $sql = "SELECT * FROM " . $table . " WHERE " . $where;
        $sql = $this->connection->query($sql);
        return $sql->fetch_assoc();
    }

    function updateData($table, $update_value, $where): bool
    {
        $this->connect();
        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        $sql = $this->connection->query($sql);
        return (bool)$sql;
    }

    function createData($table, $columns, $values): bool
    {
        $this->connect();
        $sql = "INSERT INTO " . $table . " " . $columns . " VALUES " . $values;
        $sql = $this->connection->query($sql);
        return (bool)$sql;
    }

    function deleteData($table, $filter): bool
    {
        $this->connect();
        $sql = "DELETE FROM " . $table . " " . $filter;
        $sql = $this->connection->query($sql);
        return (bool)$sql;
    }

}
