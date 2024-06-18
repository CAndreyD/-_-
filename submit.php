<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fio = pg_escape_string($db, $_POST['fio']);
    $email = pg_escape_string($db, $_POST['email']);
    $message = pg_escape_string($db, $_POST['message']);

    $query = "INSERT INTO todolist.feedback (fio, email, message) VALUES ($1, $2, $3)";
    $result = pg_query_params($db, $query, array($fio, $email, $message));

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Ошибка при сохранении данных: " . pg_last_error($db);
    }
}
?>