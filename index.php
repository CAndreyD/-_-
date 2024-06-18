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
    require 'db.php';
    $query = "SELECT * FROM todolist.feedback";
    $result = pg_query($db, $query);
    if (pg_num_rows($result) > 0) {
        echo "<h2>Сохраненные сообщения:</h2>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<p><strong>ФИО:</strong> " . htmlspecialchars($row['fio']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
            echo "<p><strong>Сообщение:</strong> " . htmlspecialchars($row['message']) . "</p><hr>";
        }
    } else {
        echo "<p>Нет сохраненных сообщений.</p>";
    }
    ?>
</body>
</html>