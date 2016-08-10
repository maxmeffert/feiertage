<?php

try  {
	
	$dir = __DIR__;
	
	$out = "$dir/feiertage.phar";
	$src = "$dir/src";
	
	$stub = file_get_contents("./stub.php");
	
	
	if (file_exists($out)) {
	
		unlink($out);
	
	}
	
	$phar = new Phar($out);
	$phar->buildFromDirectory($src);
	$phar->setStub($stub);
	$phar->compressFiles(Phar::GZ);
	

	
	if (file_exists($out)) {
		
		include_once "phar://$out";
	
	}
	

	echo "SUCCESS!";
	
}
catch (Exception $e) {
	
	header("Content-Type:text/plain");
	
	echo "ERROR BUILDING IWZ.PHAR!\n\n";
	echo "file:\t\t{$e->getFile()}\n";
	echo "line:\t\t{$e->getLine()}\n";
	echo "code:\t\t{$e->getCode()}\n";
	echo "\n\n{$e->getMessage()}\n";
	echo "\n\n{$e->getTraceAsString()}\n";
	
	die();
	
}



?>