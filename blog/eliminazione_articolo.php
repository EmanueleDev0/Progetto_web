<?php
include 'apiREST.php';  // Includi il file api.php

$connessione = require __DIR__ . "/connessione_db.php";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
        $id_articolo = $_POST["id_articolo"];

        // Chiama la funzione handleDeleteRequest
        handleDeleteRequest('articoli', $id_articolo, $connessione);

        // Puoi anche aggiungere un reindirizzamento o un messaggio qui se necessario
        header("Location: eliminazione_completata.html");
        exit;
    }
}

?>