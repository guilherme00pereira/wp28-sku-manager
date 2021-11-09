<?php

(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('cli only');
$namespace = filter_var(getopt("n:")["n"], FILTER_SANITIZE_STRING);
foreach (glob("**/*") as $file){
	try{
		echo "\e[39mReading $file file..." . PHP_EOL;
		file_put_contents($file, str_replace("REPLACE", $namespace, file_get_contents($file)));
		echo "\e[92mNamespace \e[95m$namespace \e[92mconfigured in $file" . PHP_EOL;
	} catch (Exception $e){
		echo $e->getMessage();
	}
}
