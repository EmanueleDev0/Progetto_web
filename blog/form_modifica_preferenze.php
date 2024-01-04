<?php
// Avvia la sessione
session_start();

// Verifica se l'ID del lettore è presente nella query string
if (isset($_GET['id'])) {
    // Ottieni l'ID del lettore dalla query string
    $id_lettore = $_GET['id'];

    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // Query per ottenere i dettagli del lettore con l'ID specificato
    $sql_lettore = "SELECT * FROM lettori WHERE ID = :id_lettore";
    $stmt_lettore = $connessione->prepare($sql_lettore);
    $stmt_lettore->bindParam(':id_lettore', $id_lettore, PDO::PARAM_INT);
    $stmt_lettore->execute();

    // Estrai i dati del lettore
    $lettore = $stmt_lettore->fetch(PDO::FETCH_ASSOC);

    // Ottieni le categorie preferite del lettore e convertile in un array
    $categorie_lettore = $lettore['categorie'];
    $categorieArray = explode(',', $categorie_lettore);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifica preferenze</title>
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
        <form action="modifica_preferenze.php" method="post" id="modificaAccount">
            <!-- Sezione selezione categorie preferite -->
            <div id="categorie">
                <fieldset>
                    <legend>Seleziona le tue categorie preferite</legend>
                    <div class="checkbox-group">
                        <?php
                        // Mostra le checkbox delle categorie, con quelle già selezionate
                        $tutteCategorie = array("cronaca", "economia", "politica", "sport", "motori", "moda", "informatica", "salute");
                        foreach ($tutteCategorie as $categoria) {
                            $isChecked = in_array($categoria, $categorieArray) ? 'checked' : '';
                            echo '
                                <input type="checkbox" id="' . $categoria . '" name="categorie[]" value="' . $categoria . '" ' . $isChecked . '>
                                <label for="' . $categoria . '">' . ucfirst($categoria) . '</label>';
                        }
                        ?>
                    </div>
                </fieldset>
            </div>

            <!-- Campo nascosto per passare l'ID del lettore -->
            <input type="hidden" name="id_lettore" value="<?= htmlspecialchars($id_lettore) ?>">

            <!-- Pulsante di modifica -->
            <button type="submit" class="btn">Modifica</button>
        </form>
    </div>

</body>

</html>
