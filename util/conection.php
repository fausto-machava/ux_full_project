<?php
    use \PDOException;

	$host = 'us-cdbr-east-06.cleardb.net';
	$user = 'b2fb3417b04175';
	$password = '2be6e974';
	$database = 'heroku_25155c51c27c72e';

    $conection = mysqli_connect($host, $user, $password, $database) or die ('Failed to connect to the database');
?>