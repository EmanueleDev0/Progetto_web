<?php

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

// Avvia la sessione.
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
    $id_giornalista = $giornalista["id"];
    $nome_giornalista = ucwords($giornalista["nome"]);
    $cognome_giornalista = ucwords($giornalista["cognome"]);
    $autore = $nome_giornalista . $cognome_giornalista;
}

// Recupera i dati dall'articolo inviato con il modulo POST
$titolo = ucwords($_POST["titolo"]);
$corpo = $_POST["corpo"];
$immagine = $_POST["link_immagine"];
$categoria = $_POST["categoria"];

// Prepara e esegui l'inserimento dell'articolo nella tabella "articoli"
$sql_a = "INSERT INTO articoli (titolo, contenuto, autore, nome_giornale, categoria, immagine) 
VALUES (:titolo, :contenuto, :autore, :nome_giornale, :categoria, :immagine)";

$stmt_a = $connessione->prepare($sql_a);

// Gestisce eventuali errori SQL
if (!$stmt_a){
    die("Errore SQL: ". print_r($connessione->errorInfo(), true));
}

// Associa i valori alle variabili nella query SQL
$stmt_a->bindParam(':titolo', $titolo, PDO::PARAM_STR);
$stmt_a->bindParam(':contenuto', $corpo, PDO::PARAM_STR);
$stmt_a->bindParam(':autore', $autore, PDO::PARAM_STR);
$stmt_a->bindParam(':nome_giornale', $nome_giornale, PDO::PARAM_STR);
$stmt_a->bindParam(':categoria', $categoria, PDO::PARAM_STR);
$stmt_a->bindParam(':immagine', $immagine, PDO::PARAM_STR);

// Esegue la query
$stmt_a->execute();

// Chiude il cursore e reindirizza l'utente alla pagina di conferma
$stmt_a->closeCursor();

header("Location: inserimento_articolo_completato.html");
exit;

?>
