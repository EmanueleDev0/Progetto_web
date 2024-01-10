<?php
// Inizia o ripristina la sessione
session_start();

// Verifica se l'utente è autenticato
if (isset($_SESSION["user_id"])) {
    
    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // Query per ottenere i dati del lettore
    $sql = "SELECT * FROM lettori WHERE id = :user_id";
    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION["user_id"], PDO::PARAM_INT);
    $stmt->execute();

    // Recupera i dati del lettore
    $lettore = $stmt->fetch(PDO::FETCH_ASSOC);

    // Estrarre le informazioni necessarie
    $categorie = $lettore["categorie"];
    $categorieArray = explode(',', $categorie);
    $id_lettore = $lettore["id"];
    $nome_lettore = $lettore["nome"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard lettore</title>
    <link rel="stylesheet" href="css/style.css">
    <script>

    window.onload = bindEvents;

    function bindEvents() {
        var postTitles = document.getElementsByClassName("post-title");
        for (var i = 0; i < postTitles.length; i++) {
            postTitles[i].addEventListener("click", function () {
                var articleData = JSON.parse(this.getAttribute("data-article"));
                readArticle(articleData);
            });
        }
    }

    function readArticle(articolo) {
        var idArticolo = articolo.id;

        var oReq = new XMLHttpRequest();
        oReq.onload = function () {
            // Redirect alla pagina articolo.php con i dati dell'articolo come parametri GET
            window.location.href = 'articolo.php' +
                '?titolo_articolo=' + encodeURIComponent(articolo.titolo) +
                '&immagine=' + encodeURIComponent(articolo.immagine) +
                '&autore_articolo=' + encodeURIComponent(articolo.autore) +
                '&data_pubblicazione=' + encodeURIComponent(articolo.data_pubblicazione) +
                '&contenuto=' + encodeURIComponent(articolo.contenuto);
        };
        oReq.open("GET", "api.php/articoli/" + idArticolo, true);
        oReq.send();
    }
    </script>
</head>

<body>

    <header>
        <div class="nav container">
            <a class="logo">Info<span>blog</span></a>
            <a href="form_modifica_account.php?id=<?= $id_lettore ?>" class="login">Modifica account</a>
            <a href="logout.php" class="login">Logout</a>
        </div>
    </header>

    <section class="home-lettore" id="home">
        <div class="home-text container">
            <h3 class="home-title">Blog di Informazione</h3>
            <span class="home-subtitle">Tutte le notizie di tuo interesse</span>
        </div>
    </section>

    <div class="container">
        <h3 class="benvenuto"> Benvenuto nella tua dashboard, <?= htmlspecialchars($nome_lettore)?>.</h3>
        <h4 class="sub-benvenuto">Naviga fra le tue categorie preferite</h4>
    </div>

    <!-- Filtri per le categorie -->
    <div class="post-filter-lettore container">
        <span class="filter-item active-filter" data-filter='tutto'>Tutto</span>
        <?php
        // Loop per stampare i filtri delle categorie
        foreach ($categorieArray as $categoria) {
            echo '<span class="filter-item" data-filter="' . $categoria . '">' . ucfirst($categoria) . '</span>';
        }
        ?>
    </div>

    <!-- Sezione degli articoli -->
    <section class="post container">
        <?php
        // Connessione al database
        $connessione = require __DIR__ . "/connessione_db.php";

        // Creazione della stringa di interrogazione per le categorie
        $categoriePlaceholder = implode(', ', array_fill(0, count($categorieArray), '?'));

        // Query per ottenere gli articoli con filtro sulle categorie
        $sql_articoli = "SELECT * FROM articoli WHERE categoria IN ($categoriePlaceholder) ORDER BY data_pubblicazione DESC";
        $stmt_articoli = $connessione->prepare($sql_articoli);

        // Binding dei parametri per le categorie
        foreach ($categorieArray as $index => $categoria) {
            $stmt_articoli->bindValue(($index + 1), $categoria);
        }

        $stmt_articoli->execute();

        // Array per memorizzare i dati degli articoli
        $articoli_data = array();

        while ($articoli_row = $stmt_articoli->fetch(PDO::FETCH_ASSOC)) {
            $articoli_data[] = $articoli_row;
        }

        // Query per i giornalisti
        $sql_giornalisti = "SELECT nome_giornale, logo_giornale FROM giornalisti";
        $stmt_giornalisti = $connessione->prepare($sql_giornalisti);
        $stmt_giornalisti->execute();

        // Array associativo per memorizzare i dati dei giornalisti
        $giornalisti_data = array();

        while ($giornalisti_row = $stmt_giornalisti->fetch(PDO::FETCH_ASSOC)) {
            $giornalisti_data[$giornalisti_row['nome_giornale']] = $giornalisti_row['logo_giornale'];
        }

        // Stampa degli articoli
        foreach ($articoli_data as $articoli) {
            echo '
            <div class="post-box-lettore ' . $articoli['categoria'] . '">
                    <img src="' . $articoli['immagine'] . '" alt="" class="post-img">
                    <h2 class="categoria">' . $articoli['categoria'] . '</h2>
                    <a class="post-title" data-article="'.htmlspecialchars(json_encode($articoli)).'">
                        '.$articoli['titolo'].'
                    </a>
                    <span class="post-date">' . $articoli['data_pubblicazione'] . '</span>
                    <p class="post-description">' . $articoli['contenuto'] . '</p>
                    <div class="profile">
                        <img src="' . $giornalisti_data[$articoli['nome_giornale']] . '" alt="" class="profile-img">
                        <span class="profile-name">' . $articoli['autore'] . '</span>
                    </div>
                </div>';
        }
        ?>

    </section>
    
    <p id="ajaxres"></p>
    
    <!-- Footer -->
    <div class="footer-lettore container">
        <p>&#169; Progetto Unime</p>
        <div class="social">
            <a class="social-img" href="https://www.unime.it/"><img src="img/logo_unime.png"></a>
        </div>
    </div>

    <!-- Jquery -->
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

</body>
</html>
