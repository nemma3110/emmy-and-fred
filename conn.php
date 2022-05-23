<?php
	$conn = new PDO('mysql:host=localhost;dbname=companydb', 'root', '');
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>