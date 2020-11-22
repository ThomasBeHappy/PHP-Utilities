<?php

use PHPMailer\PHPMailer\PHPMailer;

class Configuration {
    // DATABASE
    public static string $Database_host = "example.com";
    public static string $Database_username = "username";
    public static string $Database_password = "12345";
    public static string $Database_port = "21";
    public static string $Database_database = "database";

    // TABLES
    public static string $UserTable = "users";

    // MAIL SERVICE
    public static string $Mail_host = "smtp1.example.com;smtp2.example.com"; // Specify main and backup SMTP servers
    public static bool $Mail_SMTPAuth = true; // Enable SMTP authentication
    public static string $Mail_Username = "user@example.com"; // SMTP username
    public static string $Mail_Password = "secret"; // SMTP password
    public static string $Mail_SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption `PHPMailer::ENCRYPTION_SMTPS` encouraged
    public static int $Mail_Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
}