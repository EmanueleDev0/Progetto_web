<?php
// Validazione server-side

// Verifica se i campi sono vuoti
if (empty($_POST["nome"])){
    die("Il nome è richiesto.");
}

if (empty($_POST["cognome"])){
    die("Il cognome è richiesto.");
}

if (empty($_POST["email"])){
    die("L'E-mail è richiesta.");
}

if (empty($_POST["ruolo"])){
    die("Selezionare un ruolo.");
}

// Verifica se l'indirizzo email è valido
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("È richiesta una E-mail valida.");
}

// Verifica che la password sia lunga almeno 8 caratteri
if (strlen($_POST["password"]) < 8){
    die("La password deve essere almeno di 8 caratteri.");
}

// Verifica che la password contenga almeno un numero
if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("La password deve contenere almeno un numero.");
}

// Verifica che le password siano uguali
if ($_POST["password"] !== $_POST["conferma_password"]){
    die("Le password devono essere uguali.");
}

// Connessione al database
$connessione = require __DIR__ . '/connessione_db.php';

// Pulizia e assegnazione delle variabili
$testata_giornalistica = ucwords($_POST["testata_giornalistica"]);
$logo_giornale = $_POST["logo_giornale"];
$nome = ucwords($_POST["nome"]);
$cognome = ucwords($_POST["cognome"]);
$ruolo = $_POST["ruolo"];

// Crittografia della password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Inizio della query per l'inserimento dei dati nel database nella tabella giusta
if ($ruolo == 'Lettore'){

    // Creazione della stringa delle categorie selezionate, se presenti
    $categorie = isset($_POST['categorie']) ? implode(',', $_POST['categorie']) : '';

    // Query per l'inserimento dei dati nella tabella "lettori"
    $sql_l = "INSERT INTO lettori (nome, cognome, email, password, categorie) 
              VALUES (:nome, :cognome, :email, :password, :categorie)";

    $stmt_l = $connessione->prepare($sql_l);

    if (!$stmt_l) {
        die("Errore SQL: " . print_r($connessione->errorInfo(), true));
    }

    $stmt_l->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt_l->bindParam(':cognome', $cognome, PDO::PARAM_STR);
    $stmt_l->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
    $stmt_l->bindParam(':password', $password_hash, PDO::PARAM_STR);
    $stmt_l->bindParam(':categorie', $categorie, PDO::PARAM_STR);

    $stmt_l->execute();
    $stmt_l->closeCursor();
}

if ($ruolo == 'Giornalista'){

    // Query per l'inserimento dei dati nella tabella "giornalisti"
    $sql_g = "INSERT INTO giornalisti (nome, cognome, email, password, nome_giornale, logo_giornale) 
              VALUES (:nome, :cognome, :email, :password, :nome_giornale, :logo_giornale)";

    $stmt_g = $connessione->prepare($sql_g);

    if (!$stmt_g){
        die("Errore SQL: " . print_r($connessione->errorInfo(), true));
    }

    $stmt_g->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt_g->bindParam(':cognome', $cognome, PDO::PARAM_STR);
    $stmt_g->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
    $stmt_g->bindParam(':password', $password_hash, PDO::PARAM_STR);
    $stmt_g->bindParam(':nome_giornale', $testata_giornalistica, PDO::PARAM_STR);
    $stmt_g->bindParam(':logo_giornale', $logo_giornale, PDO::PARAM_STR);

    $stmt_g->execute();
    $stmt_g->closeCursor();
}

// Redirect alla pagina di registrazione completata
header("Location: registrazione_completata.html");
exit;
?>
