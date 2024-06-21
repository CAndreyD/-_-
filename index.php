<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма обратной связи</title>
</head>
<body>
    <h1>Форма обратной связи</h1>
    <form action="submit.php" method="post">
        <label for="fio">ФИО:</label>
        <input type="text" id="fio" name="fio" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="message">Текст сообщения:</label>
        <textarea id="message" name="message" required></textarea><br><br>
        <input type="submit" value="Отправить">
    </form>

    <?php
        class FeedbackForm {
            private $db;

            public function __construct($db) {
                $this->db = $db;
            }

            public function saveFeedback($fio, $email, $message) {
                $query = "INSERT INTO feedback (fio, email, message) VALUES (?, ?, ?)";
                $statement = $this->db->getConnection()->prepare($query);
                $statement->bind_param("sss", $fio, $email, $message);
                $result = $statement->execute();
                
                return $result;
            }
    }
    ?>
</body>
</html>