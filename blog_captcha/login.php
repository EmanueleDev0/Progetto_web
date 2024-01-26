<?php
// Inizializzazione flag $is_invalid a false
$is_invalid = false;

// Inizializzazione variabili per il confronto del CAPTCHA
$captchaText = ""; // Inizializza con il valore vuoto
$captchaInput = isset($_POST["captch_input"]) ? $_POST["captch_input"] : "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Connessione al database
    $connessione = require __DIR__ . "/connessione_db.php";

    // Utilizza il metodo quote per escapare la stringa e prevenire SQL injection
    $email = $connessione->quote($_POST["email"]);

    // Creazione delle query per ottenere l'utente da entrambe le tabelle
    $sqlLettore = sprintf("SELECT * FROM lettori WHERE Email = %s", $email);
    $sqlGiornalista = sprintf("SELECT * FROM giornalisti WHERE Email = %s", $email);

    // Esecuzione delle query
    $stmtLettore = $connessione->query($sqlLettore);
    $stmtGiornalista = $connessione->query($sqlGiornalista);

    // Estrai i dati dell'utente da entrambe le tabelle
    $userLettore = $stmtLettore->fetch(PDO::FETCH_ASSOC);
    $userGiornalista = $stmtGiornalista->fetch(PDO::FETCH_ASSOC);

    // Verifica se l'utente è un lettore e la password è corretta
    if ($userLettore && password_verify($_POST["password"], $userLettore["password"])) {
        // Inizia la sessione e rigenera l'ID di sessione per sicurezza
        session_start();
        session_regenerate_id();
        
        // Imposta l'ID dell'utente nella sessione e reindirizza alla dashboard del lettore
        $_SESSION["user_id"] = $userLettore["id"];
        header("Location: dashboard_lettore.php");
        exit;
    } 
    // Verifica se l'utente è un giornalista e la password è corretta
    elseif ($userGiornalista && password_verify($_POST["password"], $userGiornalista["password"])) {
        // Inizia la sessione e rigenera l'ID di sessione per sicurezza
        session_start();
        session_regenerate_id();
        
        // Imposta l'ID dell'utente nella sessione e reindirizza alla dashboard del giornalista
        $_SESSION["user_id"] = $userGiornalista["id"];
        header("Location: dashboard_giornalista.php");
        exit;
    }

    // Imposta $is_invalid a true se l'autenticazione non è riuscita
    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/captcha.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/186eb98a62.js" crossorigin="anonymous"></script>
    <title>Log in</title>
</head>
<body>
    <header>
        <div class="nav container">
            <a href="index.php" class="logo">Info<span>blog</span></a>
        </div>
    </header>

    <section class="login-section" id="home">
        <div class="home-text container">
            <h2 class="login-title">Log In</h2>
        </div>
    </section>

    <!-- Form di accesso -->
    <form method="post">
        <div class="container">
            <!-- Campo email -->
            <div>
                <label for="email"> Email </label>
                <input type="email" class="form-control" name="email" id="email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            </div>

            <!-- Campo password -->
            <div>
                <label for="password"> Password </label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <!-- Sezione Captcha -->
            <div class="container_captcha">
                <div class="Captcha_header">Verifica Captcha</div>

                <canvas id="captchaCanvas" width="200" height="30"></canvas>

                <button class="refresh_button">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>

                <div class="input_field">
                    <input class="captch_input" type="text" name="captch_input" placeholder="Enter captcha" required>
                </div>
            </div>

        </div>

        <!-- Visualizza un messaggio se l'autenticazione non è riuscita -->
        <?php if ($is_invalid): ?>
            <div class="accentra">
                <em class="message">Log in non valido, email o password errate.</em>
            </div>
        <?php endif; ?>

        <!-- Pulsante di accesso -->
        <button type="submit" class="btn">Accedi</button>

        <!-- Collegamento per la registrazione -->
        <div> 
            <p class="paragrafo">Non sei registrato? <a href="form_registrazione.html"> Clicca qui.</a></p>
        </div>

    </form>

    <script src="js/script.js"></script>
</body>
</html>
