<?php
spl_autoload_register(function($className) {
	$file = "../classes/" . $className . '.php';
	if (file_exists($file)) {
		include $file;
    }
});

// use PHPMailer\PHPMailer\PHPMailer; //TODO FIX THIS

define("DATABASE_HOST", "example.com");
define("DATABASE_USERNAME", "username");
define("DATABASE_PASSWORD", "secret");
define("DATABASE_PORT", 21);
define("DATABASE_DATABASE", "database");

define("USER_TABLE", "users");

define("MAIL_HOST", "smtp1.example.com;smtp2.example.com");
define("MAIL_SMTPAUTH", true);
define("MAIL_USERNAME", "user@example.com");
define("MAIL_PORT", 587);
define("MAIL_PASSWORD", "secret");
// define("MAIL_SMTPSECURE", PHPMailer::ENCRYPTION_STARTTLS); //TODO FIX THIS