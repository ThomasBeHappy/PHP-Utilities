<?php
include("../config/Configuration.php");
class Database {
    /**
     * 
     * Connect to the database
     * 
     * This function attempts a connection with your database.
     * 
     * @return mysqli_connection|false
     * 
     */
    public static function connect() {
        $host = DATABASE_HOST;
        $username = DATABASE_USERNAME;
        $password = DATABASE_PASSWORD;
        $port = DATABASE_PORT;
        $database = DATABASE_DATABASE;

        if ($conn = mysqli_connect($host, $username, $password, $database, $port)) {
            return $conn;
        }
        return false;
    }
}