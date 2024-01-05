<?php

session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){
    
	$connessione = require __DIR__ . "/connessione_db.php";

    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $id_articolo = $_POST["id_articolo"];
    }

    // Query per eliminare l'articolo
    $sql_elimina_articolo = "DELETE FROM articoli WHERE id = :id_articolo";
    $stmt_elimina_articolo = $connessione->prepare($sql_elimina_articolo);
    $stmt_elimina_articolo->bindParam(':id_articolo', $id_articolo, PDO::PARAM_INT);

    if ($stmt_elimina_articolo->execute()) {
        header("Location: eliminazione_completata.html");
        exit;
    }
}

?>