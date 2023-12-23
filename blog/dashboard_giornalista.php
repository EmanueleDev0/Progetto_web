<?php
session_start();

if (isset($_SESSION["user_id"])) {
    
    $connessione = require __DIR__ . "/connessione_db.php";

    $sql = "SELECT * FROM giornalisti WHERE ID = :user_id";

    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION["user_id"], PDO::PARAM_INT);
    $stmt->execute();

    $giornalista = $stmt->fetch(PDO::FETCH_ASSOC);

    $nome_giornale = $giornalista["nome_giornale"];
    $id_giornalista = $giornalista["id"];
    $nome_giornalista = $giornalista["nome"];
    $cognome_giornalista = $giornalista["cognome"];
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

        <a href="logout.php" class="login">Logout</a>

    </div>
    </header>

    <section class="home" id="home">
        <div class="home-text container">
            <h3 class="home-title">Blog di Informazione</h3>
            <span class="home-subtitle">Contribuisci al blog inserendo notizie dell'ultima ora</span>
        </div>
    </section>

    <div class="container">
        <h3> Benvenuto nella tua dashboard, <?= htmlspecialchars($nome_giornalista)?>.</h3>
        <h4>Cosa desideri fare?</h4>
    </div>

    <section class="post container">

        <div class="post-box">
            <div class="post-title">
                Se desideri scrivere un nuovo articolo clicca <a href="creazione_articolo.html">qui</a>.
            </div>
        </div>

        <div class="post-box">
            <div class="post-title">
                Se desideri modificare un articolo clicca <a href="modifica_articolo.html">qui</a>.
            </div>
        </div>

        <div class="post-box">
            <div class="post-title">
                Se desideri eliminare un articolo clicca <a href="elimina_articolo.html">qui</a>.
            </div>
        </div>

    </section>

    <div class="container">     
        <h3> Articoli pubblicati fino ad ora:</h3>
    </div>

    <!-- Da qui si può prendere lo stesso codice di index -->

    <section class="post container">

    </section>

</body>
</html>