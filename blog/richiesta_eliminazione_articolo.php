<?php

// Controlla se l'id è stato passato correttamente
if (isset($_GET['id'])) {

    $id_articolo = $_GET['id'];

    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // query per selezionare l'articolo corrispondente all'id passato attraverso il get
    $sql_articolo = "SELECT * FROM articoli WHERE id = :id_articolo";
    $stmt_articolo = $connessione->prepare($sql_articolo);
    $stmt_articolo->bindParam(':id_articolo', $id_articolo, PDO::PARAM_INT);
    $stmt_articolo->execute();

    $articolo = $stmt_articolo->fetch(PDO::FETCH_ASSOC);

} else {
    echo "Impossibile aprire l'articolo"; // Messaggio di errore 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminazione articolo</title>
    <link rel="stylesheet" href="css/style.css">
    <script>

        window.onload = bindEvents;

        function bindEvents(){
            document.getElementById("delete").addEventListener("click", deleteArticle);
        }

        function deleteArticle() {
            var id_articolo = document.getElementById("id_articolo").value;
            
            var oReq = new XMLHttpRequest();
            oReq.onload = function () {
                // Verifica se la richiesta è andata a buon fine
                if (oReq.status === 200 && oReq.readyState === 4) {
                    // Mostra il messaggio di successo
                    document.getElementById("ajaxres").innerHTML = oReq.responseText;

                    // Reindirizza l'utente alla pagina di completamento
                    window.location.href = "eliminazione_completata.html";
                } else {
                    // Se la richiesta non è andata a buon fine, mostra un messaggio di errore
                    document.getElementById("ajaxres").innerHTML = "Errore durante l'eliminazione dell'articolo.";
                }
            };

            oReq.open("DELETE", "api.php/articoli/" + id_articolo, true);
            oReq.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            // Invia la richiesta senza dati nel corpo
            oReq.send();
        }
    </script>
</head>

<body>

    <header>

        <div class="nav container">

            <a href="javascript:history.back()" class="logo">Info<span>blog</span></a>

        </div>

    </header>

    <section class="login-section" id="home">
        <div class="home-text container">
            <a href="javascript:history.back()" class="back-home">Torna alla Home</a>
            <h2 class="login-title">Elimina l'articolo selezionato</h2>
        </div>
    </section>

    <!-- Form per la conferma di eliminazione dell'articolo -->
    <div class="container">
        <form id="eliminazione">
            <h3>Sei sicuro di voler eliminare l'articolo?</h3>
            <input type="hidden" name="id_articolo" id="id_articolo" value="<?= htmlspecialchars($id_articolo) ?>">
            <button type="button" id="delete" class="scelta">Si</button>
            <button type="button" onclick="javascript:history.back()" class="scelta">No</button>
        </form>
    </div>
    <p id="ajaxres"></p>

</body>

</html>