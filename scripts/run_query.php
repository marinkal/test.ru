<?php
	require("database_connection.php");
	$query_text = $_REQUEST['query'];
	$result = $conn->query($query_text);
	if (!$result) {
		die("<p>Ошибка при выполнении SQL-запроса" . $query_text . ": " .
	pg_result_error() . "</p>");
	}
	$return_rows = true;
	if (preg_match("/^ *(CREATE|INSERT|UPDATE|DELETE|DROP)/i",
	$query_text)) {
	$return_rows = false;
	}
	if($return_rows){

	echo "<p>Результаты вашего запроса:</p>";
	echo "<ul>";
	foreach($result as $row) {
		echo "<li>{$row[0]}</li>";
		}
echo "</ul>";
}
else
	echo "Запрос выполнен успешно";

?>