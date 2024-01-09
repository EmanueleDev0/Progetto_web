<?php
include 'apiREST.php';  
    
$connessione = require __DIR__ . "/connessione_db.php";

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    if (isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
        $titolo = $_POST["titolo"];
        $titolo = ucwords($titolo);
        $corpo = $_POST["corpo"];
        $immagine = $_POST["link_immagine"];
        $categoria = $_POST["categoria"];
        $id_articolo = $_POST["id_articolo"];

        // Chiama la funzione handleDeleteRequest
        handlePutRequestTitolo('articoli', $titolo, $id_articolo, $connessione);
        handlePutRequestCorpo('articoli', $corpo, $id_articolo, $connessione);
        handlePutRequestImmagine('articoli', $immagine, $id_articolo, $connessione);
        handlePutRequestCategoria('articoli', $categoria, $id_articolo, $connessione);

        // Puoi anche aggiungere un reindirizzamento o un messaggio qui se necessario
        header("Location: modifica_articolo_completata.html");
        exit;
    }
}

?>