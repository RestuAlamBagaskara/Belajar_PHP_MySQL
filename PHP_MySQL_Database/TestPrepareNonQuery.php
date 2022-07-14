<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "alam";
$password = "rahasia";

$sql = "INSERT INTO admin(Username, Password) VALUES (:username, :password)";
$statement = $connection->prepare($sql);
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
$statement->execute();

$connection = null;
