<?php
	header('Content-Type: text/html; charset=utf-8');
	require 'scripts/database_connection.php';
	$first_name = trim($_REQUEST['first_name']);
	$last_name = trim($_REQUEST['last_name']);
	$email = trim($_REQUEST['email']);
	$facebook_url = str_replace("facebook.org", "facebook.com", trim($_REQUEST['facebook_url']));
	$position = strpos($facebook_url, "facebook.com");
	if ($position === false) {
		$facebook_url = "http://www.facebook.com/" . $facebook_url;
	}
	$twitter_handle = trim($_REQUEST['twitter_handle']);
	$twitter_url = "http://www.twitter.com/";
	$position = strpos($twitter_handle, "@");
	if ($position === false) {
	$twitter_url = $twitter_url . $twitter_handle;
		$twitter_url = $twitter_url . substr($twitter_handle, $position + 1);
	} 
	$bio = trim($_REQUEST["bio"]);
	$tmp = $conn->prepare("INSERT INTO users(first_name,last_name,email,facebook_url,twitter_handle,bio) VALUES(?,?,?,?,?,?)");
	$result = $tmp->execute([$first_name,$last_name,$email,$facebook_url,$twitter_handle,$bio]);
	if($result) {
		//header("Location: show_user.php?user_id=" . currval("user_identifier"));
	}
	 else "Ошибка ".pg_result_error($result);
?>
