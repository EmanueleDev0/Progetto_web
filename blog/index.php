<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        var idArticolo = articolo.id; // Assumi che ci sia un campo 'id' nell'oggetto articolo

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

        <a href="login.php" class="login">Login</a>

    </div>

    </header>

    <section class="home" id="home">
        <div class="home-text container">
            <h3 class="home-title">Blog di Informazione</h3>
            <span class="home-subtitle">Tutte le notizie di tuo interesse</span>
        </div>
    </section>

    <!-- Filtri delle categorie -->
    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter='tutto'>Tutto</span>
        <span class="filter-item" data-filter='cronaca'>Cronaca</span>
        <span class="filter-item" data-filter='economia'>Economia</span>
        <span class="filter-item" data-filter='politica'>Politica</span>
        <span class="filter-item" data-filter='sport'>Sport</span>
        <span class="filter-item" data-filter='motori'>Motori</span>
        <span class="filter-item" data-filter='moda'>Moda</span>
        <span class="filter-item" data-filter='informatica'>Informatica</span>
        <span class="filter-item" data-filter='salute'>Salute</span>
    </div>
    
    <!-- Sezione per la visualizzazione degli articoli -->
    <section class="post container">
    <?php
        $connessione = require __DIR__ . "/connessione_db.php";

        // Query per gli articoli
        $sql_articoli = "SELECT * FROM articoli ORDER BY data_pubblicazione DESC";
        $stmt_articoli = $connessione->prepare($sql_articoli);
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

        // Stampa gli articoli
        foreach ($articoli_data as $articoli) {
            echo '
                <div class="post-box ' . $articoli['categoria'] . '">
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
    <div class="footer container">
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