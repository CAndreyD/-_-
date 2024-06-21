<?php
    class Database {
        private $connection;

        public function __construct($host, $dbname, $user, $password) {
            $this->connection = new mysqli($host, $user, $password, $dbname);
            if ($this->connection->connect_error) {
                die("Ошибка подключения к базе данных: " . $this->connection->connect_error);
            }
        }

        public function getConnection() {
            return $this->connection;
        }
    }

?>
