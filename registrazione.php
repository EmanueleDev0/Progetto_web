<?php
// Validazione server-side
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

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("E' richiesta una E-mail valida.");
}

if(strlen($_POST["password"]) < 8){
    die("La password deve essere almeno di 8 caratteri.");
}

if(!preg_match("/[0-9]/", $_POST["password"])) {
    die("La password deve contenere almeno un numero.");
}


if($_POST["password"] !== $_POST["conferma_password"]){
    die("Le password devono esssere uguali.");
}

$connessione = require __DIR__ . '/connessione_db.php';


$testata_giornalistica = $_POST["testata_giornalistica"];
$testata_giornalistica = ucwords($testata_giornalistica);
$nome = $_POST["nome"];
$nome = ucwords($nome);
$cognome= $_POST["cognome"];
$cognome = ucwords($cognome);
$ruolo = $_POST["ruolo"];



// Query per inserire dentro la tabella lettori

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);  // Crittografia della password

if ($ruolo == 'Lettore'){

    $categorie = isset($_POST['categorie']) ? implode(',', $_POST['categorie']) : '';

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

    $sql_g = "INSERT INTO giornalisti (nome, cognome, email, password, nome_giornale) 
    VALUES (:nome, :cognome, :email, :password, :nome_giornale)";

    $stmt_g = $connessione->prepare($sql_g);

    if (!$stmt_g){
        die("Errore SQL: ". print_r($connessione->errorInfo(), true));
    }
    
    $stmt_g->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt_g->bindParam(':cognome', $cognome, PDO::PARAM_STR);
    $stmt_g->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
    $stmt_g->bindParam(':password', $password_hash, PDO::PARAM_STR);
    $stmt_g->bindParam(':nome_giornale', $testata_giornalistica, PDO::PARAM_STR);


    $stmt_g->execute();
    $stmt_g->closeCursor();
}

                     
    header("Location: registrazione_completata.html");
    exit;


?>