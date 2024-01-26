<?php

session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){

	$connessione = require __DIR__ . "/connessione_db.php";

    if ($_SERVER["REQUEST_METHOD"] === 'GET'){
    $id_lettore = $_GET["id"];
    }

    // Query per eliminare l'lettore
    $sql_elimina_lettore = "DELETE FROM lettori WHERE id = :id";
    $stmt_elimina_lettore = $connessione->prepare($sql_elimina_lettore);
    $stmt_elimina_lettore->bindParam(':id', $id_lettore, PDO::PARAM_INT);

    if ($stmt_elimina_lettore->execute()) {
        header("Location: index.php");
        exit;
    }
}

?>