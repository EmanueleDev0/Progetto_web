<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connessione = require __DIR__ . "/connessione_db.php";

    $email = $connessione->quote($_POST["email"]); // Utilizza quote per escapare la stringa

    $sqlLettore = sprintf("SELECT * FROM lettori WHERE Email = %s", $email);
    $sqlGiornalista = sprintf("SELECT * FROM giornalisti WHERE Email = %s", $email);

    $stmtLettore = $connessione->query($sqlLettore);
    $stmtGiornalista = $connessione->query($sqlGiornalista);

    $userLettore = $stmtLettore->fetch(PDO::FETCH_ASSOC);
    $userGiornalista = $stmtGiornalista->fetch(PDO::FETCH_ASSOC);

    if ($userLettore && password_verify($_POST["password"], $userLettore["password"])) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $userLettore["id"];
        header("Location: dashboard_lettore.php");
        exit;
    } elseif ($userGiornalista && password_verify($_POST["password"], $userGiornalista["password"])) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_id"] = $userGiornalista["id"];
        header("Location: dashboard_giornalista.php");
        exit;
    }

    $is_invalid = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Log in</title>
</head>

<body>

    <header>

    <div class="nav container">

        <a href="#" class="logo">Info<span>blog</span></a>

    </div>

    </header>

    <section class="login-section" id="home">
        <div class="home-text container">
            <h2 class="login-title">Log In</h2>
        </div>
    </section>

        <form method="post">
            <div class="container">
                <div>
                <label for="email"> Email </label>
                <input type="email" class="form-control" name="email" id="email"
                        value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                </div>

                <div>
                <label for="password"> Password </label>
                <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>

            <?php if ($is_invalid): ?>
                <div class="accentra">
                    <em>Log in non valido.</em>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn">Accedi</button>
            
            <div> 
                <p class="paragrafo">Non sei registrato? <a href="form_registrazione.html"> Clicca qui.</a></p>
            </div>

        </form>

</body>
</html>