<?php
include("../config/Configuration.php");

class Auth {
    /**
     * 
     * Attempt to login
     * 
     * @param string $username The input username
     * @param string $password The input password
     * @param bool $remember The 'remember me' checkmark (optional)
     * 
     * @return bool
     * 
     */
    public static function attempt($username, $password, $remember = false) {
        $user = SQL::select("SELECT * FROM " . USER_TABLE . " WHERE username = ?", $username); // Call select function from SQL.php and assign the output values to $user
        if(!$user) { // Is user false?
            return false; // If yes, return false
        }
        if(!password_verify($password, $user["password"])) { // Verify input password with database password
            return false; // If the password can not be verified, return false
        }
        if($remember) { // Is $remember set to true?
            setcookie("loggedin", $user["id"], "86400 * 7"); // If yes, set a cookie for one week to stay logged in
        } else {
            $_SESSION["loggedin"] = $user["id"]; // Else, set a session variable 
        }
        return true; // After everything has been done, return true
    }

    /**
     * 
     * Check is user is logged in
     * 
     * @return bool
     */
    public static function check() {
        if($_COOKIE["loggedin"] || $$_SESSION["loggedin"]) {
            return true;
        }
        return false;
    }

    /**
     * 
     * Get a user's database info
     * 
     */
    public static function user() {
        if(!Auth::check()) {
            return false;
        }

        $user = SQL::select("SELECT * FROM users WHERE id = ?", (isset($_COOKIE["loggedin"]) ? $_COOKIE["loggedin"] : $_SESSION["loggedin"])); // Select the user information
        // '(isset($_COOKIE["loggedin"]) ? $_COOKIE["loggedin"] : $_SESSION["loggedin"])' is a short if-statement. 
        // Before the ? is what you want to check.
        // To the left of : will echo what you want to put there if the if-statement is true. 
        // To the right of : will echo what you want to put there if the if-statement is false.
        // So for example, (Is something true ? If it is, put "true" : If it is not, put "false")
        // For a more detailed information, visit https://davidwalsh.name/php-shorthand-if-else-ternary-operators 
        
        return $user; // In the end, return the user data
    }
}