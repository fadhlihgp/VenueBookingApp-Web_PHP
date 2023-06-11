<?php

class AppDbContext
{
    private $connection;

    function connectDb() {
        $host = "localhost";
        $username = "root";
        $database = "futsaldb";
        $this->connection = mysqli_connect($host, $username, "", $database);
        if (!$this->connection) {
            echo "<script>
                alert('Connection Failed')
            </script>";
            die("Connection Failed : " . mysqli_connect_error());
        }
        return $this->connection;
    }

    function closeConnect() {
        mysqli_close($this->connection);
    }
}