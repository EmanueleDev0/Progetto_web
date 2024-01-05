<?php

// Verifica se l'ID dell'articolo è stato fornito tramite GET
if (isset($_GET['id'])) {
    
    // Ottieni l'ID dell'articolo dalla query string
    $id_articolo = $_GET['id'];

    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // Query per ottenere i dettagli dell'articolo con l'ID specificato
    $sql_articolo = "SELECT * FROM articoli WHERE ID = :id_articolo";
    $stmt_articolo = $connessione->prepare($sql_articolo);
    $stmt_articolo->bindParam(':id_articolo', $id_articolo, PDO::PARAM_INT);
    $stmt_articolo->execute();

    // Estrai i dati dell'articolo
    $articolo = $stmt_articolo->fetch(PDO::FETCH_ASSOC);

    // Assegna i dati alle variabili per utilizzarli nella pagina HTML
    $titolo_articolo = $articolo['titolo'];
    $corpo_articolo = $articolo['contenuto'];
    $autore_articolo = $articolo['autore'];
    $immagine = $articolo['immagine'];
    $categoria = $articolo['categoria'];

} else {
    // Se l'ID non è stato fornito, mostra un messaggio di errore
    echo "Impossibile aprire l'articolo";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifica articolo</title>
</head>

<body>

    <header>
        <div class="nav container">
            <a href="javascript:history.back()" class="logo">Info<span>blog</span></a>
        </div>

        <div class="home-text container">
            <a href='javascript:history.back()' class='back-home'>Torna alla Home</a>
            <h2 class="login-title">Modifica l'articolo selezionato</h2>
        </div>
    </header>

    <!-- Sezione modifica articolo -->
    <section class='post-header-modifica'>
        <form action="modifica_articolo.php" method="post" id="modifica">
            <div class='header-content post-container'>

                <!-- Campo per il titolo dell'articolo -->
                <h1 class="campo-trasparente">
                    <input class='header-title-trasparente' type="text" placeholder="INSERISCI IL TITOLO" id="titolo" name="titolo" value="<?= htmlspecialchars($titolo_articolo) ?>" required oninput="updateTitlePreview(this.value)">
                </h1>

                <!-- Campo per il link dell'immagine -->
                <input class="campo-trasparente header-title-trasparente" type="text" id="link_immagine" name="link_immagine" value="<?= htmlspecialchars($immagine) ?>" placeholder="Inserisci il link dell'immagine" required oninput="updateImagePreview(this.value)">
                <img style="display: none;" src="" alt='' class='image-preview header-img-modifica' id="imagePreview">
            
            </div>
    </section>

    <!-- Sezione contenuto dell'articolo -->
    <section class='post-content post-container'>

        <!-- Anteprima del titolo -->
        <h2 class='sub-heading-articolo' id="previewTitle"></h2>

        <!-- Campo per il corpo dell'articolo -->
        <p class='post-text'><textarea class="campo-trasparente-corpo accentra" type="text" id="corpo" name="corpo" placeholder="INSERISCI IL CORPO DELL'ARTICOLO" required><?= htmlspecialchars($corpo_articolo) ?></textarea></p>

        <!-- Sezione selezione categoria -->
        <div id="campi" class="accentra-scelte-categorie">
            <div id="categorie">
                <label for="categoria">Seleziona la categoria</label>
                <select id="categoria" name="categoria" onmouseover="this.size=9;" onmouseout="this.size=1;" onchange="this.size=1;" required>
                    <option value="vuoto"> </option>
                    <option value="cronaca" <?= ($categoria === 'cronaca') ? 'selected' : '' ?>>Cronaca</option>
                    <option value="economia" <?= ($categoria === 'economia') ? 'selected' : '' ?>>Economia</option>
                    <option value="politica" <?= ($categoria === 'politica') ? 'selected' : '' ?>>Politica</option>
                    <option value="sport" <?= ($categoria === 'sport') ? 'selected' : '' ?>>Sport</option>
                    <option value="motori" <?= ($categoria === 'motori') ? 'selected' : '' ?>>Motori</option>
                    <option value="moda" <?= ($categoria === 'moda') ? 'selected' : '' ?>>Moda</option>
                    <option value="informatica" <?= ($categoria === 'informatica') ? 'selected' : '' ?>>Informatica</option>
                    <option value="salute" <?= ($categoria === 'salute') ? 'selected' : '' ?>>Salute</option>
                </select>
            </div>                
        </div>
        
        <!-- Campo nascosto per passare l'ID dell'articolo -->
        <input type="hidden" name="id_articolo" value="<?= htmlspecialchars($id_articolo) ?>">

        <!-- Pulsante di modifica -->
        <div class="accentra-scelte-categorie">
            <button type="submit" class="btn">Modifica</button>
        </div>

    </section>
    </form>

    <!-- Footer -->
    <div class="footer-articolo-modifica container">
        <p>&#169; Progetto Unime</p>
        <div class="social">
            <a class="social-img" href="https://www.unime.it/"><img src="img/logo_unime.png"></a>
        </div>
    </div>
    
    <!-- Script jQuery e personalizzato -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

</body>

</html>