<?php
    use \PDOException;

	$host = 'localhost';
	$user = 'root';
	$password = '1234';
	$database = 'ux';

    $conection = mysqli_connect($host, $user, $password, $database) or die ('Failed to connect to the database');
?>