<?php

spl_autoload_register(function($class){
	
	$class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
	
	$filename =  __DIR__."/src/$class.php";
	
	if (file_exists($filename)) {
		
		include_once $filename;
		
	}
	
	
	
});

?>