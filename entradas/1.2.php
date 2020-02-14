<?php
session_start();
if (isset($_GET['i']) && isset($_GET['a'])) {
	

	$servername = "127.0.0.1";

	$username = "palili";

	$password = "palili";

	$dbname = "blog";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);

	}
	if ($_GET['a'] == 'like') {
		$sql = "INSERT INTO mg(autor_id, post_id) VALUES ($_SESSION[id], $_GET[i])";
	}
	if ($_GET['a'] == 'dislike') {
		$sql = "INSERT INTO nmg(autor_id, post_id) VALUES ($_SESSION[id], $_GET[i])";
	}
	if ($_GET['a'] == 'comment') {
		$sql = "INSERT INTO mg(autor_id, post_id) VALUES ($_SESSION[id], $_GET[i])";
	}
		


	if ($conn->query($sql) === TRUE) {
	
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;

	}

	$conn->close();
}

?>