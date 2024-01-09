<?php
session_start();

// Verifica se l'utente è autenticato tramite sessione
if (isset($_SESSION["user_id"])) {
    
    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // Recupera informazioni sul giornalista dal database
    $sql = "SELECT * FROM giornalisti WHERE id = :user_id";
    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION["user_id"], PDO::PARAM_INT);
    $stmt->execute();

    // Ottieni i dati del giornalista
    $giornalista = $stmt->fetch(PDO::FETCH_ASSOC);

    // Estrarre le informazioni necessarie
    $nome_giornale = $giornalista["nome_giornale"];
    $id_giornalista = $giornalista["id"];
    $nome_giornalista = $giornalista["nome"];
    $cognome_giornalista = $giornalista["cognome"];
    $logo_giornale = $giornalista["logo_giornale"];

    // Query per verificare se ci sono articoli associati a questo giornalista
    $sql_a = "SELECT nome_giornale FROM articoli
              WHERE nome_giornale = :nome_giornale";

    $stmt_a = $connessione->prepare($sql_a);
    $stmt_a->bindParam(':nome_giornale', $nome_giornale, PDO::PARAM_STR);
    $stmt_a->execute();

    // Recupera il risultato della query
    $articoli = $stmt_a->fetch(PDO::FETCH_ASSOC);

    // Se ci sono articoli, memorizza il nome del giornale degli articoli
    if ($articoli !== false && $articoli !== null){
        $nome_giornale_articoli = $articoli["nome_giornale"];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard Giornalista</title>
</head>

<body>
    <header>

    <div class="nav container">

        <a href="#" class="logo">Info<span>blog</span></a>
        <a href="form_modifica_account_giornalista.php?id=<?= $id_giornalista ?>" class="login">Modifica account</a>
        <a href="logout.php" class="login">Logout</a>

    </div>
    </header>

    <section class="home-lettore" id="home">
        <div class="home-text container">
            <h3 class="home-title">Blog di Informazione</h3>
            <span class="home-subtitle">Contribuisci al blog inserendo notizie dell'ultima ora</span>
        </div>
    </section>

    <div class="container">
        <h3 class="benvenuto"> Benvenuto nella tua dashboard, <?= htmlspecialchars($nome_giornalista)?>.</h3>
        <h4 class="sub-benvenuto">Cosa desideri fare?</h4>
    </div>

    <!-- Sezione per scrivere un nuovo articolo o navigare nel blog -->
    <section class="post container">

        <div class="dashboard-box">
            <div class="post-title">
                Se desideri scrivere un nuovo articolo <a href="form_creazione_articolo.html">clicca qui</a>.
            </div>
        </div>

        <div class="dashboard-box">
            <div class="post-title">
                Se desideri navigare nel blog liberamente <a href="navigazione_giornalista.php">clicca qui</a>.
            </div>
        </div>

    </section>

    <!-- Sezione per visualizzare gli articoli pubblicati dal giornalista -->
    <?php if ($articoli !== false && $articoli !== null): ?>

        <div class="container">     
            <h3 class="benvenuto"> Articoli pubblicati fino ad ora dalla tua testata giornalistica:</h3>
        </div>

        <div class="post-filter-lettore container">
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

    <?php endif; ?>

    <?php
    // Se ci sono articoli, recupera e visualizza gli articoli
    if (isset($nome_giornale_articoli)) {
        $sql_a1 = "SELECT * FROM articoli
        WHERE nome_giornale = :nome_giornale
        ORDER BY data_pubblicazione DESC";

        $stmt_a1 = $connessione->prepare($sql_a1);
        $stmt_a1->bindParam(':nome_giornale', $nome_giornale, PDO::PARAM_STR);
        $stmt_a1->execute();

        echo '<section class="post container">';

        while ($articoli = $stmt_a1->fetch(PDO::FETCH_ASSOC)) {
            echo '
                <div class="post-box-lettore '.$articoli['categoria'].'">
                    <img src="'.$articoli['immagine'].'" alt="" class="post-img">
                    <h2 class="categoria">'.$articoli['categoria'].'</h2>
                    <a href="articolo.php?id='.$articoli['id'].'" class="post-title">
                        '.$articoli['titolo'].'
                    </a>
                    <span class="post-date">'.$articoli['data_pubblicazione'].'</span>
                    <p class="post-description">'.$articoli['contenuto'].'</p>
                    <div class="profile">
                        <img src="'.$logo_giornale.'" alt="" class="profile-img">
                        <span class="profile-name">'.$articoli['autore'].'</span>
                        <div class="profile-buttons">
                            <a class="edit-button" href="form_modifica_articolo.php?id='.$articoli['id'].'">Modifica</a>
                            <a class="elimina-button" href="richiesta_eliminazione_articolo.php?id='.$articoli['id'].'">Elimina</a>
                        </div>
                    </div>                    
                </div>';
        }
        
        echo '</section>';

    }   else {
            // Messaggio se non ci sono ancora articoli pubblicati
            echo "<div class='container'>
                    <h3 class='home-subtitle'> Non hai ancora caricato alcun articolo. </h3>
                    </div>";
        }

    ?>
    <!-- Footer della pagina -->
    <div class="footer-lettore container">
        <p>&#169; Progetto Unime</p>
        <div class="social">
            <a class="social-img" href="https://www.unime.it/"><img src="img/logo_unime.png"></a>
        </div>
    </div>
    
    <!-- Script JavaScript (jQuery) -->
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

</body>
</html>