<?php

$connessione = require __DIR__ . "/connessione_db.php";

$email = $_GET["email"];

// Verifica se l'email è già presente nella tabella lettori
$sql_lettori = "SELECT * FROM lettori WHERE Email = :email";
$stmt_lettori = $connessione->prepare($sql_lettori);
$stmt_lettori->bindParam(':email', $email, PDO::PARAM_STR);
$stmt_lettori->execute();
$result_lettori = $stmt_lettori->fetchAll(PDO::FETCH_ASSOC);

// Verifica se l'email è già presente nella tabella giornalisti
$sql_giornalisti = "SELECT * FROM giornalisti WHERE Email = :email";
$stmt_giornalisti = $connessione->prepare($sql_giornalisti);
$stmt_giornalisti->bindParam(':email', $email, PDO::PARAM_STR);
$stmt_giornalisti->execute();
$result_giornalisti = $stmt_giornalisti->fetchAll(PDO::FETCH_ASSOC);

// Verifica se l'email è disponibile
$is_available = empty($result_lettori) && empty($result_giornalisti);

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);
