<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "alam";
$password = "rahasia";

$sql = "SELECT * FROM admin WHERE Username = :username AND Password = :password";
$statement = $connection->prepare($sql);
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
$statement->execute();

if ($row = $statement->fetch()) {
    echo "Sukses Login : " . $row["Username"] . PHP_EOL;
} else {
    echo "Gagal Login" . PHP_EOL;
}

$connection = null;
