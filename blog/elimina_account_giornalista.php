<?php

session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){

	$connessione = require __DIR__ . "/connessione_db.php";

    if ($_SERVER["REQUEST_METHOD"] === 'GET'){
    $id_giornalista = $_GET["id"];
    }

    // Query per eliminare l'giornalista
    $sql_elimina_giornalista = "DELETE FROM giornalisti WHERE id = :id";
    $stmt_elimina_giornalista = $connessione->prepare($sql_elimina_giornalista);
    $stmt_elimina_giornalista->bindParam(':id', $id_giornalista, PDO::PARAM_INT);

    if ($stmt_elimina_giornalista->execute()) {
        header("Location: index.php");
        exit;
    }
}

?>