<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $connessione = require __DIR__ . "/connessione_db.php";
    
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        // Verifica se l'array 'categorie' è stato inviato tramite il modulo
        if (isset($_POST['categorie']) && is_array($_POST['categorie'])) {
            // Ottieni le categorie selezionate come stringa
            $categorieSelezionate = implode(",", $_POST['categorie']);
        }

        $id_lettore = $_POST["id_lettore"];
    }

    // Vengono effettuate le modifiche in base ai parametri selezionati
    if (!empty($categorieSelezionate)) {
        $sql = "UPDATE lettori SET categorie = :categorieSelezionate WHERE id = :id_lettore";
        $stmt = $connessione->prepare($sql);
        $stmt->bindParam(':categorieSelezionate', $categorieSelezionate, PDO::PARAM_STR);
        $stmt->bindParam(':id_lettore', $id_lettore, PDO::PARAM_INT);
        $stmt->execute();
    }

    header("Location: modifica_account_completata.html");
    exit;
}
?>
