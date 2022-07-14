<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$connection->beginTransaction();


//Bila Ada satu saja yang gagal maka semua nya juga akan digagalkan
$connection->exec("INSERT INTO comments(email, comment) VALUES ('restu@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('restu@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('restu@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('restu@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('restu@test.com', 'hi')");

$connection->commit();

$connection = null;
