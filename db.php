<?php
$db = pg_connect("host=localhost dbname=postgres user=postgres password=rootroot");
if (!$db) {
    die("Ошибка подключения к базе данных");
}
?>
