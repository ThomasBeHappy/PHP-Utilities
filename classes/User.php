<?php
include("../config/Configuration.php");
class User {
    public static function register($username, $email, $password) {
        $encryptedPassword = password_hash($password, 1);
        return SQL::idu("INSERT INTO ". USER_TABLE ." (username, email, password) VALUES (?, ?, ?)", $username, $email, $encryptedPassword);
    }

    public static function editPassword($userID, $newPassword) {
        $encryptedPassword = password_hash($newPassword, 1);
        return SQL::idu("UPDATE ". USER_TABLE ." SET password=? WHERE ID=?", $encryptedPassword, $userID);
    }

    public static function editEmail($userID, $newEmail) {
        return SQL::idu("UPDATE ". USER_TABLE ." SET email=? WHERE ID=?", $newEmail, $userID);
    }

    public static function getUser($userID) {
        return SQL::select("SELECT * FROM ". USER_TABLE ." WHERE ID=?", $userID);
    }

    public static function delete($userID) {
        return SQL::idu("DELETE FROM ". USER_TABLE ." WHERE ID=?", $userID);
    }
}