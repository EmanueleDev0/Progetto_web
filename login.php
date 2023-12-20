<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connessione = require __DIR__ . "/connessione_db.php";

    $email = $connessione->quote($_POST["email"]); // Utilizza quote per escapare la stringa

    $sql = sprintf("SELECT * FROM lettori WHERE Email = %s 
                    UNION 
                    SELECT * FROM giornalisti WHERE Email = %s", $email, $email);

    $risultato = $connessione->query($sql);

    $user = $risultato->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($_POST["password"], $user["password"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["ID"];
            header("Location: index.php");
            exit;
        }
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Registrazione completa</title>
</head>

<body>

<div class="container">

    <h1 class="title">Log in</h1>

    <?php if ($is_invalid): ?>
        <em>Log in non valido.</em>
    <?php endif; ?>

        <form method="post">

        <div class="form-group">
        <label for="email"> Email </label>
        <input type="email" class="form-control" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>

        <div class="form-group">
        <label for="password"> Password </label>
        <input type="password" class="form-control" name="password" id="password">
        </div>

        <button type="submit" class="btn">Accedi</button>

</form>
</div>

<div> 
<p>Non sei registrato? <a href="form_registrazione.html"> Clicca qui.</a></p>
</div>

</body>
</html>