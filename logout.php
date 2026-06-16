<?php
require_once('conn.php');

$_SESSION = [];
session_destroy();

header('Location: index.php');
exit;
?>