<?php

session_start();  // Inizializzazione della sessione
if (isset($_SESSION["user_id"])){
    
	$connessione = require __DIR__ . "/connessione_db.php";
    
    if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $titolo = $_POST["titolo"];
    $titolo = ucwords($titolo);
    $corpo = $_POST["corpo"];
    $immagine = $_POST["link_immagine"];
    $categoria = $_POST["categoria"];
    $id_articolo = $_POST["id_articolo"];
    }
}

// Vengono effettuate le modifiche in base ai parametri selezionati

if (!empty($titolo)) {
    $sql = "UPDATE articoli SET titolo = :titolo WHERE id = :id_articolo";
    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':titolo', $titolo, PDO::PARAM_STR);
    $stmt->bindParam(':id_articolo', $id_articolo, PDO::PARAM_INT);
    $stmt->execute();
}

if (!empty($corpo)){
    $sql = "UPDATE articoli SET contenuto = :corpo WHERE id = :id_articolo";
    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':corpo', $corpo, PDO::PARAM_STR);
    $stmt->bindParam(':id_articolo', $id_articolo, PDO::PARAM_INT);
    $stmt->execute();
}

if (!empty($immagine)){
    $sql = "UPDATE articoli SET immagine = :immagine WHERE id = :id_articolo";
    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':immagine', $immagine, PDO::PARAM_STR);
    $stmt->bindParam(':id_articolo', $id_articolo, PDO::PARAM_INT);
    $stmt->execute();
}

if (!empty($categoria)){
    $sql = "UPDATE articoli SET categoria = :categoria WHERE id = :id_articolo";
    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $stmt->bindParam(':id_articolo', $id_articolo, PDO::PARAM_INT);
    $stmt->execute();
}
                    
header("Location: modifica_articolo_completata.html");
exit;

?>