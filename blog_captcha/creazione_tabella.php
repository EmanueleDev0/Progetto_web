<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "blog";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // creazione tabelle
  $sql = "CREATE TABLE Articoli (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(45) NOT NULL,
    contenuto TEXT NOT NULL,
    autore VARCHAR(90) NOT NULL,
    nome_giornale VARCHAR(30) NOT NULL,
    categoria VARCHAR(255) NOT NULL,
    immagine VARCHAR(255),
    data_pubblicazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $sql1 = "CREATE TABLE Lettori (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    categorie VARCHAR(255) NOT NULL,
    data_iscrizione TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $sql2 = "CREATE TABLE Giornalisti (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nome_giornale VARCHAR(90) NOT NULL,
    logo_giornale VARCHAR(255),
    data_iscrizione TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $conn->exec($sql);
  echo "Tabella Articoli creata con successo<br>";

  $conn->exec($sql1);
  echo "Tabella Utenti creata con successo<br>";

  $conn->exec($sql2);
  echo "Tabella Giornalisti creata con successo<br>";

} catch(PDOException $e) {
  echo $e->getMessage();
}

$conn = null;
?>
