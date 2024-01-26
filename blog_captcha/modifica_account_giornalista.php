<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $connessione = require __DIR__ . "/connessione_db.php";
    
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        // Verifica se l'array 'logo_giornale' è stato inviato tramite il modulo
        if (isset($_POST['immagine'])) {
            // Ottieni le logo_giornale selezionate come stringa
            $logo_giornale = $_POST['immagine'];
        }

        $id_giornalista = $_POST["id_giornalista"];
    }

    // Vengono effettuate le modifiche in base ai parametri selezionati
    if (!empty($logo_giornale)) {
        $sql = "UPDATE giornalisti SET logo_giornale = :logo_giornale WHERE id = :id_giornalista";
        $stmt = $connessione->prepare($sql);
        $stmt->bindParam(':logo_giornale', $logo_giornale, PDO::PARAM_STR);
        $stmt->bindParam(':id_giornalista', $id_giornalista, PDO::PARAM_INT);
        $stmt->execute();
    }

    header("Location: modifica_account_giornalista_completata.html");
    exit;
}
?>