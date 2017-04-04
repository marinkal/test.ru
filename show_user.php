<?php
require 'scripts/database_connection.php';
$user_id = $_REQUEST['user_id'];
echo "user$user_id";
$tmp = $conn->prepare("Select * from users where user_id=?");
$tmp->execute([$user_id]);
 $tmp->setFetchMode(PDO::FETCH_ASSOC); 
 $result = $tmp->fetchAll();
if($result){
	print_r($result);
	$row = $result[0];
	echo "результат";
	echo $result;
	$first_name = $row['first_name']; 
	$last_name = $row['last_name'];
	$bio = $row['bio'];
    $email = $row['email'];
   $facebook_url = $row['facebook_url'];
	$twitter_handle = $row['twitter_handle'];
	// Превращение $twitter_handle в URL
	$twitter_url = "http://www.twitter.com/" .
	substr($twitter_handle, $position + 1);
// Для последующего добавления
	$user_image = "/еще/не/созданное_изображение.jpg";}

	else
	{
		die("Ошибка обнаружения пользователя с ID {$user_id}");

	}
// Код присваивания значений переменным страницы
?>

<html>
<head>
<link href="../../css/phpMM.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="header"><h1>PHP & MySQL: The Missing Manual</h1></div>
<div id="example">Профиль</div>
<div id="content">
<div class="user_profile">
<h1><?= $first_name?> <?= $last_name?></h1>
<p><img src="$user_image" class="user_pic" />
$bio</p>
<p class="contact_info">Поддерживайте связь с <?=$first_name?>:</p>
<ul>
<li>...
<a href="<?=$email?>">по электронной почте</a></li>
<li>... путем
<a href="<?=$facebook_url?>">посещения его страницы на
Facebook</a></li>
<li>... путем <a href="<?=$twitter_url?>">отслеживания его сообщений
в Twitter</a></li>
</ul>
</div>
</div>
<div id="footer"></div>
</body>
</html>
