<?php
spl_autoload_register(function($className) {
	$file = "PATH TO YOUR CLASSES FOLDER" . $className . '.php';
	if (file_exists($file)) {
		include $file;
	}else {
		$file = "PATH TO YOUR CONFIGURATIONS" . $className . '.php';
		if (file_exists($file)) {
			include $file;
		}
	}
});