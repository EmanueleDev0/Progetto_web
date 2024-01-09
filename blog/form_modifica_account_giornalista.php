<?php
// Avvia la sessione
session_start();

// Verifica se l'ID del giornalista è presente nella query string
if (isset($_GET['id'])) {
    // Ottieni l'ID del giornalista dalla query string
    $id_giornalista = $_GET['id'];

    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // Query per ottenere i dettagli del giornalista con l'ID specificato
    $sql_giornalista = "SELECT * FROM giornalisti WHERE ID = :id_giornalista";
    $stmt_giornalista = $connessione->prepare($sql_giornalista);
    $stmt_giornalista->bindParam(':id_giornalista', $id_giornalista, PDO::PARAM_INT);
    $stmt_giornalista->execute();

    // Estrai i dati del giornalista
    $giornalista = $stmt_giornalista->fetch(PDO::FETCH_ASSOC);

    $logo_giornale = $giornalista['logo_giornale'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifica account</title>
</head>

<body>

    <header>
        <div class="nav container">
            <a href='javascript:history.back()' class="logo">Info<span>blog</span></a>
        </div>
    </header>

    <!-- Sezione modifica account -->
    <section class="login-section" id="home">
        <div class="home-text container">
            <a href='javascript:history.back()' class='back-home'>Torna alla Home</a>
            <h2 class="login-title">Modifica account</h2>
        </div>
    </section>

    <!-- Form per la modifica delle preferenze -->
    <div class="container">
        <form action="modifica_account_giornalista.php" method="post" id="modificaAccount">
            <!-- Sezione selezione categorie preferite -->
            <div id="logo_giornale">
                <label for="link_immagine">Link logo del giornale</label>
                <input type="text" id="link_immagine" name="link_immagine" value="<?= htmlspecialchars($logo_giornale) ?>" placeholder="Inserisci il link del logo" required oninput="updateImagePreview(this.value)">
                <img style="display: none;" src="" alt='' class='image-preview logo-img-modifica' id="imagePreview">
            </div>

            <!-- Campo nascosto per passare l'ID del giornalista -->
            <input type="hidden" name="id_giornalista" value="<?= htmlspecialchars($id_giornalista) ?>">

            <!-- Pulsante di modifica -->
            <button type="submit" class="btn">Modifica</button>
            <button type="button" class="btn-elimina" onclick="confermaEliminazione()">Elimina Account</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>
    // Funzione per confermare l'eliminazione dell'account
    function confermaEliminazione() {
        if (confirm("Sei sicuro di voler eliminare l'account?")) {
            // Se confermato, reindirizza alla pagina di eliminazione
            window.location.href = "elimina_account_giornalista.php?id=<?= htmlspecialchars($id_giornalista) ?>";
        }
    }
    </script>

</body>

</html>
