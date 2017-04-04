<?php
	header('Content-Type: text/html; charset=utf-8');
	require('app_config.php');
	try{
	$conn = new PDO("pgsql:host=".SERVERNAME.";dbname=".DATABASE,USERNAME,PASSWORD);
	echo "Вы успешно подключились к базе данных";
	
}
catch(PDOException $e){
	echo "Connection failed: " . $e->getMessage();
}
?>