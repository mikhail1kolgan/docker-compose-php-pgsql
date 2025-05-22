<?php
// --- MySQL ---
$mysqli = new mysqli("db", "user", "test", "myDb");

if ($mysqli->connect_errno) {
    echo "Ошибка подключения к MySQL: " . $mysqli->connect_error;
} else {
    echo "<h3>MySQL - Таблица Person:</h3><ul>";
    $result = $mysqli->query("SELECT * FROM Person");
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['id']}: {$row['name']}</li>";
    }
    echo "</ul>";
    $mysqli->close();
}

// --- PostgreSQL ---
$conn = pg_connect("host=postgresql dbname=pgdb user=pguser password=pgpass");

if (!$conn) {
    echo "Ошибка подключения к PostgreSQL";
} else {
    echo "<h3>PostgreSQL - Таблица users:</h3><ul>";
    $result = pg_query($conn, "SELECT * FROM users");
    if ($result) {
        while ($row = pg_fetch_assoc($result)) {
            echo "<li>{$row['id']}: {$row['name']}</li>";
        }
    } else {
        echo "<li>Ошибка запроса или таблица пуста</li>";
    }
    echo "</ul>";
    pg_close($conn);
}
?>
