<?php

// Controlla se l'id è stato passato correttamente
if (isset($_GET['id'])) {
    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    $id_giornalista=$_GET['id'];

    // Recupera informazioni sul giornalista dal database
    $sql = "SELECT * FROM giornalisti WHERE id = :id";
    $stmt = $connessione->prepare($sql);
    $stmt->bindParam(':id', $id_giornalista, PDO::PARAM_INT);
    $stmt->execute();

    // Ottieni i dati del giornalista
    $giornalista = $stmt->fetch(PDO::FETCH_ASSOC);

    // Estrarre le informazioni necessarie
    $nome_giornale = ucwords($giornalista["nome_giornale"]);
    $autore = ucwords($giornalista["nome"] . ' ' . $giornalista["cognome"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Composizione articolo</title>
    <link rel="stylesheet" href="css/style.css">
    <script>

        window.onload = bindEvents;

        function bindEvents(){
            document.getElementById("post").addEventListener("click", createArticle);
        }

        function createArticle() { 
            var data = {};
            data.titolo = document.getElementById("titolo").value;
            data.contenuto = document.getElementById("contenuto").value;
            data.immagine = document.getElementById("immagine").value;
            data.categoria = document.getElementById("categoria").value;

            // Aggiungi i parametri autore e nome_giornale
            data.autore = "<?php echo $autore; ?>";
            data.nome_giornale = "<?php echo $nome_giornale; ?>";

            var jsondata = JSON.stringify(data);

            var oReq = new XMLHttpRequest();
            oReq.onload = function () {
                // Verifica se la richiesta è andata a buon fine
                if (oReq.status === 200 && oReq.readyState === 4) {
                    // Mostra il messaggio di successo
                    document.getElementById("ajaxres").innerHTML = oReq.responseText;

                    // Reindirizza l'utente alla pagina di completamento
                    window.location.href = "inserimento_articolo_completato.html";
                } else {
                    // Se la richiesta non è andata a buon fine, mostra un messaggio di errore
                    document.getElementById("ajaxres").innerHTML = "Errore durante la creazione dell'articolo.";
                }
            };

            oReq.open("POST", "api.php/articoli/", true);
            oReq.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            // Invia la richiesta con i dati
            oReq.send(jsondata);
        }
            </script>
</head>

<body>

    <header>
        <div class="nav container">
            <a href="javascript:history.back()" class="logo">Info<span>blog</span></a>
        </div>

        <!-- Link di ritorno alla Home -->
        <div class="home-text container">
            <a href='javascript:history.back()' class='back-home'>Torna alla Home</a>
            <h2 class="login-title">Scrivi il tuo articolo</h2>
        </div>
    </header>

    <!-- Sezione per la composizione dell'articolo -->
    <section class='post-header-modifica'>
        <form id="pubblicazione">
            <div class='header-content post-container'>
                <!-- Campo per il titolo dell'articolo -->
                <h1 class="campo-trasparente">
                    <input class='header-title-trasparente' type="text" placeholder="INSERISCI IL TITOLO" id="titolo" name="titolo" required oninput="updateTitlePreview(this.value)">
                </h1>
                <!-- Campo per il link dell'immagine dell'articolo -->
                <input class="campo-trasparente header-title-trasparente" type="text" id="immagine" name="immagine" placeholder="Inserisci il link dell'immagine" required oninput="updateImagePreview(this.value)">
                <!-- Anteprima dell'immagine dell'articolo -->
                <img style="display: none;" src="" alt='' class='image-preview header-img-modifica' id="imagePreview">
            </div>
        </section>

        <!-- Sezione per il contenuto dell'articolo -->
        <section class='post-content post-container'>
            <!-- Anteprima del titolo dell'articolo -->
            <h2 class='sub-heading-articolo' id="previewTitle"></h2>
            <!-- Campo per il corpo dell'articolo -->
            <p class='post-text'><textarea class="accentra campo-trasparente-corpo" type="text" id="contenuto" name="contenuto" placeholder="INSERISCI IL CORPO DELL'ARTICOLO" required></textarea></p>

            <!-- Sezione per le categorie e il pulsante di pubblicazione -->
            <div id="campi" class="accentra-scelte-categorie">
                <!-- Selettore della categoria dell'articolo -->
                <div id="categorie">
                    <label for="categoria">Seleziona la categoria</label>
                    <select id="categoria" name="categoria" onmouseover="this.size=9;" onmouseout="this.size=1;" onchange="this.size=1;" required>
                        <option value="vuoto"> </option>
                        <option value="cronaca">Cronaca</option>
                        <option value="economia">Economia</option>
                        <option value="politica">Politica</option>
                        <option value="sport">Sport</option>
                        <option value="motori">Motori</option>
                        <option value="moda">Moda</option>
                        <option value="informatica">Informatica</option>
                        <option value="salute">Salute</option>
                    </select>
                </div>
            </div>

            <!-- Pulsante per pubblicare l'articolo -->
            <div class="accentra-scelte-categorie">
                <button type="button" id="post" class="btn">Pubblica</button>
            </div>

            <p id="ajaxres"></p>
        </section>
    </form>

    <!-- Footer -->
    <div class="footer-articolo-modifica container">
        <p>&#169; Progetto Unime</p>
        <!-- Collegamenti ai social e logo -->
        <div class="social">
            <a class="social-img" href="https://www.unime.it/"><img src="img/logo_unime.png"></a>
        </div>
    </div>

    <!-- Collegamenti ai script jQuery e al file JavaScript principale -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
