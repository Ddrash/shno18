<?php
$mysqli = new mysqli('localhost', 'root', '', 'shno');

//---------------------Проверка соединения---------------------//
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}



//---------------------Старт сессии---------------------//
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>