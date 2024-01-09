<?php
include 'apiREST.php';  // Includi il file api.php

// Verifica se i parametri dell'articolo sono stati inviati con il modulo POST
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Verifica se i parametri dell'articolo sono stati inviati con il modulo POST
    if (empty($_POST["titolo"])){
        die("Il titolo dell'articolo è richiesto.");
    }

    if (empty($_POST["corpo"])){
        die("Il corpo dell'articolo è richiesto.");
    }

    if (empty($_POST["link_immagine"])){
        die("Inserire il link dell'immagine che si vuole utilizzare.\nIl link è reperibile copiandolo online.");
    }

    if (empty($_POST["categoria"])){
        die("La categoria è richiesta.");
    }

    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // Avvia la sessione
    session_start();

    // Verifica se l'utente è autenticato
    if (isset($_SESSION["user_id"])) {
        // Recupera i dettagli del giornalista dalla tabella "giornalisti"
        $sql = "SELECT * FROM giornalisti WHERE ID = :user_id";

        $stmt = $connessione->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION["user_id"], PDO::PARAM_INT);
        $stmt->execute();

        // Estrae i dati del giornalista
        $giornalista = $stmt->fetch(PDO::FETCH_ASSOC);

        // Esegue alcune elaborazioni sui dati del giornalista
        $nome_giornale = ucwords($giornalista["nome_giornale"]);
        $autore = ucwords($giornalista["nome"] . ' ' . $giornalista["cognome"]);
    }

    // Recupera i dati dall'articolo inviato con il modulo POST
    $titolo = ucwords($_POST["titolo"]);
    $corpo = $_POST["corpo"];
    $immagine = $_POST["link_immagine"];
    $categoria = $_POST["categoria"];

    // Chiama la funzione handlePostRequestArticolo
    handlePostRequestArticolo('articoli', [
        'titolo' => $titolo,
        'contenuto' => $corpo,
        'autore' => $autore,
        'nome_giornale' => $nome_giornale,
        'categoria' => $categoria,
        'immagine' => $immagine,
    ], $connessione);

    // Chiude il cursore e reindirizza l'utente alla pagina di conferma
    header("Location: inserimento_articolo_completato.html");
    exit;
}

?>
