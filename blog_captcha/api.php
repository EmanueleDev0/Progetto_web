<?php

define('DEBUG', false);

// Gestisce una richiesta GET per ottenere un record specifico dalla tabella.
function handleGetRequestId($table, $key, $pdo) {
    $sql = "SELECT * FROM `$table`" . ($key ? " WHERE ID = " . $pdo->quote($key) : '');
    try {
        $statement = $pdo->query($sql);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        http_response_code(404);
        die($e->getMessage());
    }
}

// Gestisce una richiesta POST per inserire un nuovo articolo nella tabella.
function handlePostRequestArticolo($table, $json_data, $pdo) {
    $set = json_decode($json_data, true);
    $columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($set));
    $values = array_map(function ($value) use ($pdo) {
        return $pdo->quote($value);
    }, array_values($set));

    $columns_string = implode(', ', $columns);
    $values_string = implode(', ', $values);

    $sql = "INSERT INTO `$table` ($columns_string) VALUES ($values_string)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $lastInsertId = $pdo->lastInsertId();
        $response = array('status' => 'success', 'message' => 'INSERT OK', 'inserted_id' => $lastInsertId);
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        http_response_code(404);
        $response = array('status' => 'error', 'message' => $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

// Gestisce una richiesta PUT per aggiornare il titolo di un articolo.
function handlePutRequestTitolo($table, $input, $key, $pdo) {
    $sql = "UPDATE $table SET titolo = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $input['titolo'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        $response = array('status' => 'success', 'message' => 'PUT OK');
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        http_response_code(404);
        $response = array('status' => 'error', 'message' => $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

// Gestisce una richiesta PUT per aggiornare il corpo di un articolo.
function handlePutRequestCorpo($table, $input, $key, $pdo) {
    $sql = "UPDATE $table SET contenuto = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $input['contenuto'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        $response = array('status' => 'success', 'message' => 'PUT OK');
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        http_response_code(404);
        $response = array('status' => 'error', 'message' => $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

// Gestisce una richiesta PUT per aggiornare l'immagine di un articolo.
function handlePutRequestImmagine($table, $input, $key, $pdo) {
    $sql = "UPDATE $table SET immagine = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $input['immagine'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        $response = array('status' => 'success', 'message' => 'PUT OK');
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        http_response_code(404);
        $response = array('status' => 'error', 'message' => $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

// Gestisce una richiesta PUT per aggiornare la categoria di un articolo.
function handlePutRequestCategoria($table, $input, $key, $pdo) {
    $sql = "UPDATE $table SET categoria = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $input['categoria'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        $response = array('status' => 'success', 'message' => 'PUT OK');
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        http_response_code(404);
        $response = array('status' => 'error', 'message' => $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

// Gestisce una richiesta DELETE per eliminare un record dalla tabella.
function handleDeleteRequest($table, $key, $pdo) {
    $sql = "DELETE FROM `$table` WHERE id = " . $pdo->quote($key);
    try {
        $statement = $pdo->query($sql);
        $response = array('status' => 'success', 'message' => 'DELETE OK');
        header('Content-Type: application/json');
        echo json_encode($response);
    } catch (PDOException $e) {
        http_response_code(404);
        $response = array('status' => 'error', 'message' => $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

// Ottiene il metodo HTTP, il percorso e il corpo della richiesta
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

// Attiva la modalità debug se DEBUG è impostato su true
if (DEBUG) {
    var_dump($method);
    var_dump($request);
    var_dump($input);
}

// Connettiti al database MySQL
$connessione = require __DIR__ . "/connessione_db.php";

// Recupera il nome della tabella e la chiave dal percorso
$table = preg_replace('/[^a-z0-9_]+/i', '', array_shift($request));
$_key = array_shift($request);
$key = $_key;

// Se DEBUG è attivo, stampa le informazioni di debug
if (DEBUG) {
    var_dump($table);
    var_dump($_key);
    var_dump($key);
}

// Escapi le colonne e i valori dall'oggetto di input
if (isset($input)) {
    $columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($input));
    $values = array_map(function ($value) use ($connessione) {
        if ($value === null) return null;
        return $connessione->quote($value);
    }, array_values($input));
}

// Se DEBUG è attivo, stampa le colonne e i valori
if (DEBUG) {
    var_dump($columns);
    var_dump($values);
}

// Costruisci la parte SET del comando SQL
if (isset($input)) {
    $set = '';
    for ($i = 0; $i < count($columns); $i++) {
        $set .= ($i > 0 ? ',' : '') . '`' . $columns[$i] . '`=';
        $set .= ($values[$i] === null ? 'NULL' : '"' . $values[$i] . '"');
    }
}

// Crea un'istruzione SQL in base al metodo HTTP
switch ($method) {
    case 'GET':
        handleGetRequestId($table, $key, $connessione);
        break;
    case 'PUT':
        handlePutRequestTitolo($table, $input, $key, $connessione);
        handlePutRequestCorpo($table, $input, $key, $connessione);
        handlePutRequestImmagine($table, $input, $key, $connessione);
        handlePutRequestCategoria($table, $input, $key, $connessione);
        break;
    case 'POST':
        handlePostRequestArticolo($table, file_get_contents('php://input'), $connessione);
        break;
    case 'DELETE':
        handleDeleteRequest($table, $key, $connessione);
        break;
}

// Se DEBUG è attivo, stampa l'istruzione SQL
if (DEBUG) {
    var_dump($sql);
}
?>