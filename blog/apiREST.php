<?php

define('DEBUG', false);

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

function handlePostRequestArticolo($table, $set, $pdo) {
    $columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($set));
    $values = array_map(function ($value) use ($pdo) {
        return $pdo->quote($value);
    }, array_values($set));
    
    $columns_string = implode(', ', $columns);
    $values_string = implode(', ', $values);

    $sql = "INSERT INTO `$table` ($columns_string) VALUES ($values_string)";
    
    try {
        $statement = $pdo->query($sql);
        echo "INSERT OK";
    } catch (PDOException $e) {
        http_response_code(404);
        die($e->getMessage());
    }
}

function handlePutRequestTitolo($table, $campo, $key, $pdo) {
    $sql = "UPDATE $table SET titolo = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        echo "PUT OK";
    } catch (PDOException $e) {
        http_response_code(404);
        die($e->getMessage());
    }
}

function handlePutRequestCorpo($table, $campo, $key, $pdo) {
    $sql = "UPDATE $table SET contenuto = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        echo "PUT OK";
    } catch (PDOException $e) {
        http_response_code(404);
        die($e->getMessage());
    }
}

function handlePutRequestImmagine($table, $campo, $key, $pdo) {
    $sql = "UPDATE $table SET immagine = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        echo "PUT OK";
    } catch (PDOException $e) {
        http_response_code(404);
        die($e->getMessage());
    }
}

function handlePutRequestCategoria($table, $campo, $key, $pdo) {
    $sql = "UPDATE $table SET categoria = :campo WHERE id = :id";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':campo', $campo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $key, PDO::PARAM_INT);
        $stmt->execute();
        echo "PUT OK";
    } catch (PDOException $e) {
        http_response_code(404);
        die($e->getMessage());
    }
}

function handleDeleteRequest($table, $key, $pdo) {
    $sql = "DELETE FROM `$table` WHERE id = " . $pdo->quote($key);
    try {
        $statement = $pdo->query($sql);
        echo "DELETE OK";
    } catch (PDOException $e) {
        http_response_code(404);
        die($e->getMessage());
    }
}

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$request = explode('/', trim($request_uri, '/'));

$input = json_decode(file_get_contents('php://input'), true);

$connessione = require __DIR__ . "/connessione_db.php";

$table = preg_replace('/[^a-z0-9_]+/i', '', array_shift($request));
$_key = array_shift($request);
$key = $_key;

if (isset($input)) {
    $columns = preg_replace('/[^a-z0-9_]+/i', '', array_keys($input));
    $values = array_map(function ($value) use ($pdo) {
        if ($value === null) return null;
        return $pdo->quote((string) $value);
    }, array_values($input));
    $set = '';
    for ($i = 0; $i < count($columns); $i++) {
        $set .= ($i > 0 ? ',' : '') . '`' . $columns[$i] . '`=';
        $set .= ($values[$i] === null ? 'NULL' : $values[$i]);
    }
}

// Chiudi la connessione PDO
$pdo = null;

?>
