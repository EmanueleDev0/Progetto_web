<?php
include 'apiREST.php';  // Includi il file api.php

if ($_SERVER["REQUEST_METHOD"] === 'GET'){
    // Verifica se è presente un parametro 'id' nell'URL
    if (isset($_GET['id'])) {
        // Recupera l'id dall'URL
        $id_articolo = $_GET['id'];

        // Include il file di connessione al database
        $connessione = require __DIR__ . "/connessione_db.php";

        // Chiamata alla funzione handleGetRequest
        $result = handleGetRequestID('articoli', $id_articolo, $connessione);

        // Se la funzione handleGetRequest ha restituito risultati
        if ($result) {
            // Estrai i dati dell'articolo dalla risposta
            $articolo = $result[0];

            // Assegna i valori estratti alle variabili
            $titolo_articolo = $articolo['titolo'];
            $corpo_articolo = $articolo['contenuto'];
            // Ottenere il primo carattere del corpo dell'articolo
            $prima_lettera = mb_substr($corpo_articolo, 0, 1);
            // Ottenere il resto del corpo dell'articolo
            $resto_testo = mb_substr($corpo_articolo, 1);
            $autore_articolo = $articolo['autore'];
            $nome_giornale = $articolo['nome_giornale'];
            $immagine = $articolo['immagine'];
            $data_pubblicazione = $articolo['data_pubblicazione'];

        } else {
            // Se la funzione handleGetRequest non ha restituito risultati, mostra un messaggio di errore
            echo "Impossibile trovare l'articolo con l'ID specificato";
        }

    } else {
        // Se l'id non è presente nell'URL, mostra un messaggio di errore
        echo "Impossibile aprire l'articolo";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articolo selezionato</title>
    <!-- Collegamento allo stile CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        
        <div class="nav container">
            <!-- Link per tornare alla pagina precedente se si preme sul logo infoblog -->
            <a href="javascript:history.back()" class="logo">Info<span>blog</span></a>
        </div>
    </header>

    <?php
    // Incorpora dinamicamente i dati dell'articolo tramite echo
    echo "
    <!-- Sezione dell'intestazione dell'articolo -->
    <section class='post-header'>
        <div class='header-content post-container'>
            <!-- Link per tornare alla pagina precedente -->
            <a href='javascript:history.back()' class='back-home'>Torna alla Home</a>
            
            <!-- Titolo dell'articolo -->
            <h1 class='header-title'>$titolo_articolo</h1>
            
            <!-- Immagine dell'articolo -->
            <img src=$immagine alt='' class='header-img'>
        </div>
    </section>
    
    <!-- Sezione del contenuto dell'articolo -->
    <section class='post-content post-container'>
        <!-- Sottotitolo dell'articolo -->
        <h2 class='sub-heading'>$titolo_articolo</h2>
        
        <!-- Informazioni aggiuntive sull'articolo -->
        <span class='sub-subtitle'>Articolo di <span class='verde'>$autore_articolo</span>.\nPubblicato in data <span class='verde'>$data_pubblicazione</span>.</span>
        
        <!-- Testo principale dell'articolo -->
        <p class='post-text'>
        <span class='drop-cap'>$prima_lettera</span>$resto_testo
        </p>
    </section>";
    ?>

    <!-- Footer -->
    <div class="footer-articolo container">
        <p>&#169; Progetto Unime</p>
        <div class="social">
            <a class="social-img" href="https://www.unime.it/"><img src="img/logo_unime.png"></a>
        </div>
    </div>

    <!-- Script jQuery per il filtraggio della home -->
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>
