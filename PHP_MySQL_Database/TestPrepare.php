<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "admin'; #";
$password = "admin";

//Menggunakan Binding Parameter
$sql = "SELECT * FROM admin WHERE Username = :username AND Password = :password";
$statement = $connection->prepare($sql);
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
$statement->execute();

//Bindind Parameter menggunakan Index
// $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
// $statement = $connection->prepare($sql);
// $statement->bindParam(1, $username);
// $statement->bindParam(2, $password);
$statement->execute();

//Menggunakan prepare tanpa Binding parameter
// $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
// $statement = $connection->prepare($sql);
// $statement->execute([$username, $password]);

$success = false;
$find_user = null;
foreach ($statement as $row) {
    // sukses
    $success = true;
    $find_user = $row["username"];
}

if ($success) {
    echo "Sukse login : " . $find_user . PHP_EOL;
} else {
    echo "Gagal login" . PHP_EOL;
}

$connection = null;
