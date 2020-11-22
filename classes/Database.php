<?php

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
        $host = Configuration::$Database_host;
        $username = Configuration::$Database_username;
        $password = Configuration::$Database_password;
        $port = Configuration::$Database_port;
        $database = Configuration::$Database_database;

        if ($conn = mysqli_connect($host, $username, $password, $database, $port)) {
            return $conn;
        }
        return false;
    }
}