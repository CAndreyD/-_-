<?php
require 'db.php';
$db = new Database("localhost", "dbname", "username", "password");

require 'feedback-form.php';
$feedbackForm = new FeedbackForm($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $result = $feedbackForm->saveFeedback($fio, $email, $message);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Ошибка при сохранении данных: " . $db->getConnection()->error;
    }
}
?>